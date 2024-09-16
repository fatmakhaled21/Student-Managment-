<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class NewReportController extends Controller
{
    public function report1($pid)
    {
        // البحث عن الدفع باستخدام المعرف
        $payment = Payment::with('enrollment.batch')->find($pid);

        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        $pdf = App::make('dompdf.wrapper');
        
        // إعداد المحتوى للـ PDF
        $print = "<div style='margin:20px; padding:20px;'>";
        $print .= "<h1 align='center'>Payment Receipt</h1>";
        $print .= "<hr/>";
        $print .= "<p>Receipt No: <b>" . $pid . "</b></p>";
        $print .= "<p>Date: <b>" . $payment->paid_date . "</b></p>";
        $print .= "<p>Enrollment No: <b>" . $payment->enrollment->enroll_no . "</b></p>";
        $print .= "<p>Student Name: <b>" . $payment->enrollment->enroll_name . "</b></p>";
        $print .= "<hr/>";
        $print .= "<table style='width: 100%;'>";
        $print .= "<tr>";
        $print .= "<td>Batch</td>";
        $print .= "<td>Amount</td>";
        $print .= "</tr>";
        $print .= "<tr>";
        $print .= "<td><h3>" . $payment->enrollment->batch->name . "</h3></td>";
        $print .= "<td><h3>" . $payment->amount . "</h3></td>";
        $print .= "</tr>";
        $print .= "</table>";
        $print .= "<hr/>";
        $print .= "<span>Printed By: <b>" . (auth()->check() ? auth()->user()->name : 'Guest') . "</b></span>";
        $print .= "<span>Printed Date: <b>" . date('Y.m.d') . "</b></span>";
        $print .= "</div>";

        // تحميل المحتوى إلى PDF
        $pdf->loadHTML($print);

        // إرجاع الـ PDF للتنزيل أو العرض
        return $pdf->stream('receipt.pdf'); // يمكنك تغيير اسم الملف إذا لزم الأمر
    }
}
