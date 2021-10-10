@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div id="containerReceiving">
                        <div class="panel-body">
                            <div class="row" style="padding: 0px 10px;">
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="id_no" id="id_no" placeholder="AUTO GENERATED" readonly v-model="form.id_no" class="form-control" style="height: 37px;">
                                <label for="id_no" class="form-control-placeholder"> EIR No.</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="firstname" id="firstname" v-model="form.firstname" class="form-control" style="height: 37px;">
                                <label for="firstname" class="form-control-placeholder"> Container No.</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <v-select class="form-control" :options="sizeTypeList" v-model="form.size_type"></v-select>
                                <label for="lastname" class="form-control-placeholder"> Size Type</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <v-select
                                  class="form-control" 
                                  :options="classList"
                                  v-model="form.class"
                                  label="class_name"
                                ></v-select>
                                <label for="contact_number" class="form-control-placeholder"> Class</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="username" id="username" v-model="form.username" class="form-control" style="height: 37px;">
                                <label for="username" class="form-control-placeholder"> Type</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <v-select class="form-control" :options="heightList" v-model="form.height"></v-select>
                                <label for="password" class="form-control-placeholder"> Height</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="empty_loaded" id="empty_loaded" v-model="form.empty_loaded" class="form-control" style="height: 37px;">
                                <label for="empty_loaded" class="form-control-placeholder"> Empty Loaded</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="manufactured_date" id="manufactured_date" v-model="form.manufactured_date" class="form-control" style="height: 37px;">
                                <label for="manufactured_date" class="form-control-placeholder"> Manufactured Date</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="yard_location" id="yard_location" v-model="form.yard_location" class="form-control" style="height: 37px;">
                                <label for="yard_location" class="form-control-placeholder"> Yard Location</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="acceptance_no" id="acceptance_no" v-model="form.acceptance_no" class="form-control" style="height: 37px;">
                                <label for="acceptance_no" class="form-control-placeholder"> Acceptance No.</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="consignee" id="consignee" v-model="form.consignee" class="form-control" style="height: 37px;">
                                <label for="consignee" class="form-control-placeholder"> Consignee</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="hauler" id="hauler" v-model="form.hauler" class="form-control" style="height: 37px;">
                                <label for="hauler" class="form-control-placeholder"> Hauler</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="plate_no" id="plate_no" v-model="form.plate_no" class="form-control" style="height: 37px;">
                                <label for="plate_no" class="form-control-placeholder"> Plate No.</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="upload_photo" id="upload_photo" v-model="form.upload_photo" class="form-control" style="height: 37px;">
                                <label for="upload_photo" class="form-control-placeholder"> Upload Photo.</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="signature" id="signature" v-model="form.signature" class="form-control" style="height: 37px;">
                                <label for="signature" class="form-control-placeholder"> Signature</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <v-select class="form-control" :options="clientList" v-model="form.client"></v-select>
                                <label for="client" class="form-control-placeholder"> Client</label>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group" style="padding-right: 5px; padding-left: 5px;">
                                <input type="text" name="inspected_by" id="inspected_by" v-model="form.inspected_by" class="form-control" style="height: 37px;">
                                <label for="inspected_by" class="form-control-placeholder"> Inspected By</label>
                              </div>
                              <input name="image" id="upload_file" type="file">
                            </div>
                        </div>

                        <div class="panel-footer" style="display: flex; justify-content: flex-end;">
                            <button type="submit" class="btn btn-primary save">Save</button>
                        </div>
                    </div>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://unpkg.com/vue-select@latest"></script>

    <!-- VUE -->
    <script type="text/javascript">
      Vue.component('v-select', VueSelect.VueSelect)
      var app = new Vue({
        el: '#containerReceiving',
        data: {
          form: {},
          clientList: [],
          sizeTypeList: [],
          classList: [],
          heightList: []
        },
        methods:{
          async getClass () {
            let search = {
              keyword: 'C2'
            }
            console.log(search)
            await axios.get('/admin/container/classes', search).then( data => {
              // this.classList = data.data
              console.log('data: ', data)
            }).catch(error => {
              console.log('error: ', error)
            })
          }
        },
        mounted () {
          this.getClass()
        }
      })
    </script>
    <!--  -->
@stop
