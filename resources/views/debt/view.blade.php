@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">

            <div class="row">


                <div class="col-md-4">
                        <input type="search" class="form-control " name="query" id="name"   style="  border-radius:20px"  placeholder="search items" >
                        </div>

                        <button id="search" style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);"
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>

               @if(Auth::user()->status=='admin')
               <a href="{{url('debt/create')}}" >
                   <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                       <i class="fa fa-plus-circle"></i> Add New
                   </button>
               </a>
           @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>

                        <th>Date</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Reason</th>

                        <th>Total Amount</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($debt as $debt)
                        <tr>

                          <td>{{$debt->date}}</td>
                          <td>{{$debt->name}}</td>
                          <td>{{$debt->phone}}</td>
                          <td>{{$debt->address}}</td>
                          <td>{{$debt->reason}}</td>
                          <td>{{$debt->total_amount}}</td>
                         <td>
                         <a href="{{url('debt/'.$debt->id.'/edit')}}" style="text-decoration: none;">
                         <button  class="btn btn-dark btn-sm" > <i class="fa fa-plus-circle"></i> Add Order </button>
                         </a>

                         </td>
                         <td>
                            <a href="{{url('debt/'.$debt->id.'/debt_list')}}" style="text-decoration: none;">
                            <button  class="btn btn-success btn-sm" > <i class="fa fa-search"></i> View </button>
                            </a>

                            </td>
                                <form action="{{ url('debt/'.$debt->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>

                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i>  </button>
                                </td>

                            </form>
                           </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

        </div>
    </div>

    </div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('click', function(){
            var query = $('#name').val();

            var tbody = document.getElementById('tbody');
            tbody.innerHTML = '';



          $.ajax({
                url:'{{route('search_debt')}}',
                type:'GET',
                data:{'name':query},
                success:function(data) {
                    console.log(data)

                    data.forEach(item => {

                        if(item.order_id == null){
                    item.order_id = '';
                }
                    tbody.innerHTML +=

                    '<tr>' +
                        '<td>'+item.date+'</td>'+
                 '<td>'+item.name+'</td>'+
                 '<td>'+item.phone+'</td>'+
                 '<td>'+item.address+'</td>'+
                 '<td>'+item.reason+'</td>'+
                 '<td>'+item.total_amount+'</td>'+
                 '<td><button type="button" class="btn btn-dark btn-sm m-2" onclick="editFunction('+item.id+')">'+
                    '<i class="fa fa-plus-circle"></i> Add Order</button>'+

                    '<td><button type="button" class="btn btn-success btn-sm m-2" onclick="viewFunction('+item.id+')">'+
                    '<i class="fa fa-search"></i> View</button>'+

                    '<button clas class="btn btn-danger btn-sm ml-4" onclick="deleteFunction('+item.id+')"> <i class="fa fa-trash"></i></button></td>'+

                    '</tr>';


                      })

            }
              })
    });
}); function deleteFunction(id)
    {

        event.preventDefault();
        window.location.href = 'debt/'+id+'/destroy';

    }
    function editFunction(id)
    {

        event.preventDefault();
        window.location.href = 'debt/'+id+'/edit';

    }
    function viewFunction(id)
    {

        event.preventDefault();
        window.location.href = 'debt/'+id+'/debt_list';

    }
</script>
