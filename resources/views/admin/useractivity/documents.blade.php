<div id="Documents" class="tab-pane fade">
   <div class="row">
      <div class="col-md-12 d-flex">
         <div class="card   flex-fill">
            <div class="card-body  ">
               <!-- blank -->
               <div class="p-5 text-center">
                  <span class="dash-widget-icon float-none mb-2"><i class="fa fa-file"></i></span>
                  @if($data->documents->count()>0)
                  <h4><b>{{$data->name}}</b> has {{$data->documents->count()}} {{$data->documents->count()>1?'documents':'document'}} Uploaded</h4>
                  @else
                  <h4><b>{{$data->name}}</b> has no document Uploaded</h4>
                  @endif
                  <button class="btn btn-lg btn-rounded btn-primary" data-toggle="modal" data-target="#adddocuments">Upload Document</button>
               </div>
               <!-- blank  -->
               <div class="clearfix">
                  <button class="btn btn-sm btn-rounded btn-primary pull-right" data-toggle="modal" data-target="#adddocuments">Add Documents</button>
               </div>
               <ul class="files-list">
                  @foreach($data->documents as $document)
                  <li>
                     <div class="files-cont">
                        <div class="file-type">
                           <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                        </div>
                        <div class="files-info">
                           <span class="file-name text-ellipsis"><a href="{{ asset(env('PUBLIC_PATH') . 'uploads/documents/' . $document->document) }}" target="_blank">{{$document->document_title}}</a></span>
                           <span class="file-date">{{$document->created_at->format('F dS')}} at {{$document->created_at->format('h:i:s A')}}</span>
                           <div class="file-size">Size: {{$document->document_size}}</div>
                        </div>
                        <ul class="files-action">
                           <li class="dropdown dropdown-action">
                              <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" >
                                 <a class="dropdown-item" href="{{ asset(env('PUBLIC_PATH') . 'uploads/documents/' . $document->document) }}" download>Download</a>
                                 <a class="dropdown-item" href="{{route('admin.clients.documentsdelete', $document->id)}}" onclick="return confirm('Are you sure you want to delete this?')" data-target="#delete">Delete</a>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </li>
                 @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Add Documents Modal -->
<div id="adddocuments" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Documents  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{route('admin.clients.documents')}}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-md-8 offset-2">
                     <div class="row">
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <label class="col-form-label">Document Title  <span class="text-danger">* </span></label>
                              <input type="text" name="document_title" class="form-control" placeholder="Title">
                           </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Document  <span class="text-danger">* </span></label>
                              <div class="custom-file">
                                 <input type="file" name="document" class="custom-file-input" >
                                 <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                              </div>
                           </div>
                        </div>
                        <!--  -->
                     </div>
                  </div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Upload </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Documents Modal -->