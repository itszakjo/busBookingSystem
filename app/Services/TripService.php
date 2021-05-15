<?php

namespace App\Services;


use App\Models\Trips;
use App\Repository\BookingRepositoryInterface;
use App\Repository\TripRepositoryInterface;
use App\Exceptions\NotFoundException;
use Illuminate\Support\Facades\DB;


class TripService implements TripServiceInterface
{


    public function __construct(TripRepositoryInterface $tripRepository, BookingRepositoryInterface $bookingRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function search($start_point, $end_point,$date){

//        return $data = Trips::select('trips.*' , 'routes.start_point', 'routes.end_point','routes.stop_points')
//            ->join('routes','trips.route','=','route.id')
//            ->where('routes.start_point' , $start_point)
//            ->where('routes.end_point' , $end_point)
//            ->get();

    }


    public function getTripAvailableSeats($trip_id,$pickup_point,$drop_point){

        
        // first we will get all the booked seats
        $tripSeats = [];
        $allTripSeats = $this->getTripSeats($trip_id);
        $stationsOrders = $this->getTripStationsOrder($trip_id);
        foreach ($allTripSeats as $seat) {
//            echo $seat['id'] . '<br>';
            $info['id'] = $seat['id'];
            $info['name'] = $seat['name'];
            $seatRoutes = $this->getSeatRoutes($seat['id'], $allTripSeats);
            $info['booked'] = $this->seatAvailablityChecker($seatRoutes, $pickup_point, $drop_point, $stationsOrders);
            $tripSeats[] = $info;
        }
       
        return $tripSeats;



    }

    private function getTripSeats($tripId)
    {
        $trip = $this->getTripBookings($tripId);
        $seats = $trip['bus']['seats']->toArray();
        if ($seats == []) {
            throw new NotFoundException('There are no available seats for this trip');
        }
        return $seats;
    }

    private function getTripBookings($tripId)
    {
        try
        {
            $trip = $this->tripRepository->getTripSeatsWithBookings($tripId);

        } catch (Expetion $e) {
            throw $e;
        }
        if ($trip == []) {
            throw new NotFoundException('Trip was not found');
        }
        return $trip;
    }

    private function getTripStationsOrder($trip_id)
    {
        $stationsOrder = [];

        $stations = $this->tripRepository->getTripStations($trip_id)['route']['stations'];

        foreach ($stations as $station) {
            $stationsOrder[$station['id']] = $station['pivot']['stop_order'];
        }

        return $stations;
    }

    private function getSeatRoutes($seatId, $seatBookedRoutes)
    {
        $seatInArray = array_filter($seatBookedRoutes, function ($item) use ($seatId) {
            return $item['id'] == $seatId;
        });

        $seatInArray = array_values($seatInArray);

        if ($seatInArray == []) {
            throw new NotFoundException('Seat was not found ');
        }
        return $seatInArray[0];
    }

    private function checkSeatExistence($seatId, $pickup_point, $drop_point, $tripId)
    {
        $tripBookedSeats = $this->getTripSeats($tripId);

        $seaBookings = $this->getSeatRoutes($seatId, $tripBookedSeats);

        $stationsOrders = $this->getTripStationsOrder($tripId);

        return $this->seatAvailablityChecker($seaBookings, $pickup_point, $drop_point, $stationsOrders);
    }

    private function seatAvailablityChecker($seaBookings, $pickup_point, $drop_point, $stationsOrders)
    {
        $seatBookings = $seaBookings['bookings'];
        
        // if the seat does not have any booking , then it means it is not booked anywhere
        if ($seatBookings == []) {
            return false;
        }else{

//            $vook = array();

            foreach ($seatBookings as $booking) {

//                array_push($vook , [
//
//                    'pickup' => $booking['pickup_point'],
//                    'drop' => $booking['drop_point']
//                ]);

                $start_point = $booking['pickup_point'];
                $end_point = $booking['drop_point'];


                if(($pickup_point < $start_point && $pickup_point < $end_point &&
                        $drop_point <= $start_point && $drop_point < $end_point) ||
                    ($pickup_point > $start_point && $pickup_point >= $end_point &&
                        $drop_point > $start_point && $drop_point > $end_point)){

                    return false;

                }else{

                    return true;
                }

            }
        }



//        return $vook;
    }



    public function bookSeat($seat_id, $pickup_point, $drop_point, $trip_id)
    {

        // using database transactions to avoid race condition
        DB::beginTransaction();

        try {

            $this->commitTransaction($seat_id, $pickup_point, $drop_point, $trip_id);

        } catch (\Exception $e) {

            $this->rollBackTransaction($e);

        }

    }

    private function commitTransaction($seat_id, $pickup_point, $drop_point, $trip_id)
    {
        if (!$this->checkSeatExistence($seat_id, $pickup_point, $drop_point, $trip_id)) {
            abort('404' , 'Seat is not Available');
        }

        sleep(5);

        $booking =  $this->bookingRepository->book($seat_id,$pickup_point, $drop_point, $trip_id);

        DB::commit();

        return $booking;
    }

    private function rollBackTransaction($e)
    {
        DB::rollBack();

        return $e;
    }

}