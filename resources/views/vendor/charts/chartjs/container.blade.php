<canvas width="400" height="300"  style="display: none;" id="{{ $chart->id }}" {!! $chart->formatContainerOptions('html') !!}></canvas>
@include('charts::loader')