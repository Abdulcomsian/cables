{{-- @php  $addressList = []; @endphp
@foreach($locations as $addressDetail)
    @php
        $postcode = $addressDetail['postcode'];
        $langitude = $addressDetail['longitude'];
        $latitude = $addressDetail['latitude'];
        // $town = $addressDetail['post_town'];
        $lineOne = $addressDetail['line_1'];
        $lineTwo = $addressDetail['line_2'];
        $lineThree = $addressDetail['line_3'];
        foreach($addressDetail as $key => $address)
        {
            $addedAddress = array_unique(array_column($addressList , 'location'));
            $haveAddress =  str_contains($key , "line") && !empty($address) && !in_array( $address , $addedAddress) ? true : false; 
            $haveAddress && $addressList[] = [ 
                'postcode' => $postcode, 
                'longitude' => $langitude,  
                'latitude' =>  $latitude,
                // 'town' => $town,
                'location' => $address,
                'line1' => $lineOne,
                'line2' => $lineTwo,
                'line3' => $lineThree,
            ];
        } 
           
    @endphp

@endforeach 
@foreach($addressList as $address)
    <div class="address" data-address-postcode="{{$address['postcode']}}" data-address-lat="{{$address['longitude']}}" data-address-lng="{{$address['latitude']}}">{{$address['line1']}}, {{$address['line2']}} {{$address['line3']}}</div>
@endforeach --}}


@php
    $addressList = [];
    $uniqueAddresses = []; // Array to track unique address combinations
@endphp

@foreach($locations as $addressDetail)
    @php
        $postcode = $addressDetail['postcode'];
        $longitude = $addressDetail['longitude'];
        $latitude = $addressDetail['latitude'];
        $lineOne = $addressDetail['line_1'];
        $explodedLineTwo = explode(',', $addressDetail['line_2']);
        $lineTwo = $explodedLineTwo[0];
        $explodedLineThree = explode(',', $addressDetail['line_3']);
        $lineThree = $explodedLineThree[0];

        // Create a combined string for uniqueness check
        $addressKey = $lineOne . $lineTwo . $lineThree . $postcode . $longitude . $latitude;

        // Only add address if the combined key does not exist yet
        if (!in_array($addressKey, $uniqueAddresses)) {
            $uniqueAddresses[] = $addressKey;
            $addressList[] = [
                'postcode' => $postcode,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'location' => $lineOne, // Adjust according to how you want to display the location
                'line1' => $lineOne,
                'line2' => $lineTwo,
                'line3' => $lineThree,
            ];
        }
    @endphp
@endforeach

{{-- Output unique addresses --}}
@php
    $emptyLine3Addresses = [];
    $nonEmptyLine3Addresses = [];
    
    // Separate the addresses based on whether 'line3' is empty or not
    foreach ($addressList as $address) {
        if (empty($address['line3'])) {
            $emptyLine3Addresses[] = $address;
        } else {
            $nonEmptyLine3Addresses[] = $address;
        }
    }
@endphp

{{-- First, display addresses with an empty line3 --}}
@foreach($emptyLine3Addresses as $address)
    <div class="address" 
         data-address-postcode="{{ $address['postcode'] }}" 
         data-address-lat="{{ $address['latitude'] }}" 
         data-address-lng="{{ $address['longitude'] }}">
        {{ $address['line1'] }}
    </div>
@endforeach

{{-- Then, display addresses with a non-empty line3 --}}
@foreach($nonEmptyLine3Addresses as $address)
    <div class="address" 
         data-address-postcode="{{ $address['postcode'] }}" 
         data-address-lat="{{ $address['latitude'] }}" 
         data-address-lng="{{ $address['longitude'] }}">
        {{ $address['line1'] }}, {{ $address['line2'] }} {{ $address['line3'] }}
    </div>
@endforeach


