                        <h4>Services </h4>
                         <div class="row">
                            <div class="col-md-4">
                                @foreach ($services as $value)
                                     <li>
                                       {{service($value->service)}} ({{ $value->domain }})
                                       <br/>
                                        Rate: {{ $value->price }} 
                                        <br/>
                                        Time in years: {{ $value->time }}
                                        <br>
                                        Payment Status: 
                                        @if(getServiceStatus($value->id) == '2')
                                        Cancel
                                        @elseif(getServiceStatus($value->id) == '1')
                                        Paid
                                        @else
                                        Unpaid
                                        @endif
                                       <br/>
                                       Service type: {{ servicetype($value->service_type) }}
                                    </li>
                                @endforeach
                               
                            </div>
                        </div>