<h3>
    Hii, We have Received your {{strtolower(str_replace('_',' ',$enquiry->enquiry_type))}} with reference id
    : {{$enquiry->reference_id}}
</h3>

<table>
    <tbody>
    <tr>
        <td>Name</td>
        <td>{{$enquiry->name}}</td>
    </tr>

    <tr>
        <td>Email</td>
        <td>{{$enquiry->email}}</td>
    </tr>

    <tr>
        <td>Phone</td>
        <td>{{$enquiry->phone}}</td>
    </tr>

    <tr>
        <td>Query</td>
        <td>{{$enquiry->query}}</td>
    </tr>

    @if($enquiry->source)
        <tr>
            <td>Source</td>
            <td>{{$enquiry->source}}</td>
        </tr>
    @endif
    @if($enquiry->destination)
        <tr>
            <td>Destination</td>
            <td>{{$enquiry->destination}}</td>
        </tr>
    @endif
    @if($enquiry->depart_date)
        <tr>
            <td>Depart Date</td>
            <td>{{$enquiry->depart_date}}</td>
        </tr>
    @endif
    @if($enquiry->return_date)
        <tr>
            <td>Return Date</td>
            <td>{{$enquiry->return_date}}</td>
        </tr>
    @endif
    @if($enquiry->adults)
        <tr>
            <td>Adults</td>
            <td>{{$enquiry->adults}}</td>
        </tr>
    @endif
    @if($enquiry->children)
        <tr>
            <td>Children</td>
            <td>{{$enquiry->children}}</td>
        </tr>
    @endif
    @if($enquiry->infants)
        <tr>
            <td>Infants</td>
            <td>{{$enquiry->infants}}</td>
        </tr>
    @endif
    @if($enquiry->cabin)
        <tr>
            <td>Cabin</td>
            <td>{{$enquiry->cabin}}</td>
        </tr>
    @endif
    @if($enquiry->carrier)
        <tr>
            <td>Carrier</td>
            <td>{{$enquiry->carrier}}</td>
        </tr>
    @endif
    @if($enquiry->accept_privacy)
        <tr>
            <td>Privacy</td>
            <td>{{$enquiry->accept_privacy}}</td>
        </tr>
    @endif
    </tbody>
</table>
