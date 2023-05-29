                        <h4>Services </h4>
                         <div class="row">
                            <div class="col-md-4">
                                @foreach ($services as $value)
                                     <li>
                                       {{service($value->service)}} ({{ $value->domain }})
                                       <br/>
                                        Price: {{ $value->price }}
                                        <br/>
                                        Payment Status: {{ $value->staus==0 ? 'Due' : 'Paid' }}
                                       <br/>
                                       Service type: {{ servicetype($value->service_type) }}
                                    </li>
                                @endforeach
                               
                            </div>
                        </div>