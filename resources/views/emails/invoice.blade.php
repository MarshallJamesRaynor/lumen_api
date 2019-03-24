<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body style="background-color: #f6f6f6;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;height: 100%;line-height: 1.6;">

<table style="background-color: #f6f6f6;width: 100%;">
    <tr>
        <td></td>
        <td style="display: block;max-width: 600px;margin: 0 auto;clear: both;" width="600">
            <div style="max-width: 600px;margin: 0 auto;display: block;padding: 20px;">
                <table style="background: #fff;border: 1px solid #e9e9e9;border-radius: 3px;" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style=" padding: 20px;  text-align: center;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 0 0 20px;">
                                        <h1>{{$order->total_paid}} Paid</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 20px;">
                                        <h2>Thanks for using Bla Bla </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 20px;">
                                        <table style="margin: 40px auto;text-align: left; width: 80%;">
                                            <tr>
                                                <td>{{$userdata->last_name}} {{$userdata->first_name}}<br>Invoice #{{$order->invoices_number}}<br>
                                                    {{$order->invoices_data}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width: 100%; border-top: #eee 1px solid;" cellpadding="0" cellspacing="0">

                                                        @foreach ($orderItems as $orderItem)
                                                            <tr>
                                                                <td style="padding: 5px 0;  border-top: #eee 1px solid;">
                                                                    {{ $orderItem->products->name }}
                                                                </td>
                                                                <td style="padding: 5px 0;  border-top: #eee 1px solid;text-align: right;">
                                                                    {{ $orderItem->total() }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr style="border-top: 2px solid #333; border-bottom: 2px solid #333;font-weight: 700;">
                                                            <td style="padding: 5px 0;  border-top: #eee 1px solid; text-align: right;" width="80%">Total</td>
                                                            <td style="padding: 5px 0;  border-top: #eee 1px solid; text-align: right;"> {{$order->total_paid}}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 20px;">
                                        Bla Bla  123 Van Bla, Bla Bla 94102
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>
