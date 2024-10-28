<section>
@auth
  

    <div onclick="location.href='{{ route('showProperty', $property) }}';" class="card" style="width: 18rem; position:absolute; cursor:pointer;">

            <img class="" src="{{ $property->image }}" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $property->name }}</h5>
              <h5 class="card-title" style="font-weight: normal;">{{ $property->price }}</h5>
              <p class="card-text">{{ $property->description }}</p>
              
            </div>
      
        </div>
@else


<div class="card" style="width: 18rem; position:absolute; cursor:pointer;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalRegister">

  <img class="" src="{{ $property->image }}" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $property->name }}</h5>
    <h5 class="card-title" style="font-weight: normal;">{{ $property->price }}</h5>
    <p class="card-text">{{ $property->description }}</p>
    
  </div>

</div>



        @endauth
</section>