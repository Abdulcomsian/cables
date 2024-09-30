@php  $addressList = []; @endphp
@foreach($locations as $addressDetail)
    @php
        $postcode = $addressDetail['postcode'];
        $langitude = $addressDetail['longitude'];
        $latitude = $addressDetail['latitude'];
        $town = $addressDetail['post_town'];
       
        foreach($addressDetail as $key => $address)
        {
            $addedAddress = array_unique(array_column($addressList , 'location'));
            $haveAddress =  str_contains($key , "line") && !empty($address) && !in_array( $address , $addedAddress) ? true : false; 
            $haveAddress && $addressList[] = [ 
                'postcode' => $postcode, 
                'longitude' => $langitude,  
                'latitude' =>  $latitude,
                'town' => $town,
                'location' => $address  
            ];
        } 
           
    @endphp

@endforeach 
@foreach($addressList as $address)
    <div class="address" data-address-postcode="{{$address['postcode']}}" data-address-lat="{{$address['longitude']}}" data-address-lng="{{$address['latitude']}}">{{$address['location']}}, {{$address['town']}}</div>
@endforeach