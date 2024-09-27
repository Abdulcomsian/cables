@foreach($locations as $address)
    @php
        $addressDetail  = get_object_vars($address);
        //starts from line
    @endphp

    <div class="address" data-address-postcode="{{$address['postcode']}}" data-address-lat="{{$address['longitude']}}" data-address-lng="{{$address['latitude']}}">{{$address['line_1']}}, {{$address['post_town']}}</div>
@endforeach 