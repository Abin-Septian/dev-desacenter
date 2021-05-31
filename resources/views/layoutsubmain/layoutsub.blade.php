@extends('layoutlanding/layoutlanding')

@section('title','apa itu desacenter.id')

@section('container')



    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>

    <a-scene>
     <a-box 
     position = "0 1.5 -2"
     color = "#550000"
     >    
     </a-box>
    </a-scene>

    @endsection