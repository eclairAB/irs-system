@extends('voyager::master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
<style>
    .containers_ {
      display: grid;
      justify-items: end;
      box-shadow: 0px 2px 10px 0px #00000017;
      border-radius: 5px;
      padding: 1%;
      margin: .5%;
      background-color: white;
    }

    .paginator_ {
      height: fit-content;
    }

    section {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }

    th {
      border-color: #eaeaea;
      background: #f8fafc;
      color: #337ab7;
    }
</style>
<body>
    <div style="font-size: 15px; color: #555; font-weight: bold; display: flex; margin: 20px 10px 10px; align-items: center;">
        <i style="font-size: 25px; margin-right: 10px; height: 35px;" class="voyager-list"></i> <span>Containers</span>
    </div>
    <div id="container-inquiry">
        <div row>
            <div class="col-md-12 paginator_ containers_">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                          <th style="padding: 10px 10px;">
                              Container
                          </th>
                          <th style="text-align-last: end; padding: 10px 10px;">
                              {{-- Action --}}
                          </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($containers as $item)
                            <tr style="border-top: solid #5c5c5c29 1px">
                                <td style="padding: 0 10px">
                                    {{ $item->container_no }}
                                </td>
                                <td style="padding: 0 10px">
                                    <button style="padding: 3px 10px;" class="btn btn-sm btn-warning pull-right edit" v-on:click="reroute('{{ $item->container_no }}')">
                                        <i class="voyager-eye"></i><span class="hidden-xs hidden-sm" style="margin-left:5px;">View</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr style="border-top: solid #5c5c5c29 1px; font-weight: bold; color: #979797;">
                                <td style="padding: 0 10px;">No record at this moment</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <br>
                {{ $containers->links() }}
            </div>
        </div>      
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
    var vm = new Vue({
    el: '#container-inquiry',
    data:{
    },
    methods: {
        reroute(x) {
            location.href = x
        },
    }
  })
</script>
@endsection
