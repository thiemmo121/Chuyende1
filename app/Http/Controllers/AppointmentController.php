<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('customer')->latest()->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'date_format:H:i'],
        ]);

        $appointmentAt = Carbon::parse($data['appointment_date'] . ' ' . $data['appointment_time']);

        if ($appointmentAt->isPast()) {
            return back()->withInput()->withErrors(['appointment_date' => 'Không thể đặt lịch trong quá khứ.']);
        }

        $conflict = Appointment::whereDate('appointment_date', $data['appointment_date'])
            ->whereTime('appointment_time', $data['appointment_time'])
            ->where('status', '!=', 'canceled')
            ->exists();

        if ($conflict) {
            return back()->withInput()->withErrors(['appointment_time' => 'Khung giờ này đã có lịch khác.']);
        }

        $customer = Customer::create(['name' => $data['customer_name']]);

        Appointment::create([
            'customer_id' => $customer->id,
            'appointment_date' => $data['appointment_date'],
            'appointment_time' => $data['appointment_time'],
            'status' => 'scheduled',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Đã đặt lịch thành công.');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->update(['status' => 'canceled']);

        return back()->with('success', 'Đã hủy lịch.');
    }
}
