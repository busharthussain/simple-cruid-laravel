<h1>Customer</h1>

<table style="border: 1px solid">
    <tr >
       <td>Name</td>
       <td>Address</td>
       <td>Contact</td>
       <td>Suit Quantity</td>
       <td>Total Price</td>
       <td>Remaining Price</td>
       <td>Note</td>

    </tr>
         <tr>
             <td>{{$excel->first_name}} {{$excel->last_name}}</td>
             <td>{{$excel->address}}</td>
             <td>{{$excel->contact}}</td>
             <td>{{$excel->suit_quantity}}</td>
             <td>{{$excel->total_price}}</td>
             <td>{{$excel->remaining_price}}</td>
             <td>{{$excel->note}}</td>
         </tr>
</table>