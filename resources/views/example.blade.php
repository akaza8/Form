<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- @unless(Auth::check())
        <p>You Are Not Signed In</p>
    @endunless
    @if(count($records)>1)
        <p>having more than 1 records</p>
    @elseif(count($records)==1)
        <p>having only a record</p>
    @else
        <p>No records Found</p>
    @endif -->
    @forelse($records as $key=>$item)
        @if(is_array($item))
            <p><strong>{{$key}}</strong></p>
            @foreach($item as $subitem)
            <span>{{$subitem}}</span>
            {{--$key--}}
            @endforeach
        @else
            <span>{{$item}}</span>
        @endif
        @empty
        <p>no item</p>
    @endforelse
    
    
</body>
</html>