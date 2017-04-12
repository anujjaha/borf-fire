@extends('backend.layouts.app')

@section('content')
      
    <div id="systemMessage"></div>
    <p>
        <a href="{!! route('admin.events.create') !!}" class="btn btn-success">Add New</a>
    </p>

    <div class="panel panel-default">

        <div class="panel-heading">
            List
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2" style="float:right;">
              <select id="filter-select" name="filter-select" class="form-control">
                  <option value="0">Select Filter</option>
                  <option value="Yes">Active</option>
                  <option value="No">In-Active</option>
              </select>
            </div>
            <!-- <div class="col-md-2" style="float:right;">
              <input type="text" name="filter-title" id="filter-title" class="form-control">
            </div> -->
          </div>
        </div>
        <div class="panel-body">
            <table id="plan_list" class="table table-bordered table-striped {{ count($events) > 0 ? 'datatable' : '' }} table-hover ">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Is Active</th>
                      <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($events) > 0)
                    <?php $i = 0 ?>
                        @foreach ($events as $value)
                          <?php $i++ ?>
                            <tr id="item-{!! $value->id !!}">
                                    <td>{{$i}}</td>

                                <td><a href="\admin\plans\edit\{{$value->id}}" title="Click to edit {{@$value->name}}">{{@$value->name}}</a></td>
                  <td>{{ $value->title}}</td>
                  <td>{{ $value->quote_per_month}}</td>
                  <td>{{ $value->description}}</td>
                  <td class="is_deleted_column">{{ $value->event_status ? 'Active' : 'Inactive'}}</td>
                  <td>
                      <a href="\admin\events\edit\{{$value->id}}" title="Click to edit {{@$value->name}}">Edit</a>
                      @if(!$value->event_status)
                      | <a class="delete-item" data-id="{!! $value->id !!}" href="javascript:void(0);" title="Click to Deactivate {{@$value->title}}">Deactivate</a>
                      @endif
                  </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">no record found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
<input type="hidden" id="ajaxToken" name="_token" value="{{ csrf_token() }}">

<script>

  
@if(count($events))
  $(function () {
     var oTable;
      oTable = $('#plan_list').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });


      jQuery('#filter-select').change( function() { 
        if(jQuery('#filter-select').val() == 0)
        {
          return;
        }
        oTable.fnFilter( $(this).val() ); 
       });
  });
@endif
  var moduleConfig = {
        deletePlanUrl: '{!! route('admin.events.delete') !!}',
         deactivatePlanUrl: '{!! route('admin.events.deactivate') !!}'
    };

  jQuery(document).ready(function()
  {
      jQuery('.delete-item').on('click', function()
      {
          deletePlan(this);
      });

  });

function deletePlan(element)
{
  var status    = confirm("Are you Sure want to Deactivate Event ?"),
      elementId = jQuery(element).data('id');

  if(status == false)
  {
    return false;
  }

  jQuery.ajax({
    url: moduleConfig.deactivatePlanUrl,
    type: 'POST',
    dataType: 'JSON',
    data: {
      'id': elementId,
      '_token': jQuery("#ajaxToken").val()
    },
    success: function(data)
    {
      if(data.status == true)
      {
        jQuery("#item-" + elementId ).find(".is_deleted_column").html('No');
        showSystemMessages('#systemMessage', 'success', 'Deactivated Event Successfully!');
      }
    },
    error: function(data)
    {
      showSystemMessages('#systemMessage', 'success', 'Unable to Deactivated Event');
    }
  });
}
</script>

@endsection