<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trabajos realizados por {{$name}} {{$surname}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('edit.jobs') }}">
                   
                    @csrf

                 

            
                        <input type="text" name="idWorker" wire:model="idWorker">
                  
                        <input type="text" name="check" value="{{$check}}">

                        <div class="form-group">

                            <p class="font-weight-bold">Trabajos</p>
                            
                       
        
                            @foreach ($details as $key => $jobs)
                                
        
                            <tr>
                            
                                <td scope="row">
                               
                                <input class="form-check-input ml-4"
                                type="checkbox" name="job[{{ $key }}]"
                                 value="{{$jobs->id}}" >
                                {{$jobs->trabajo}}
        
        
                                
                                </td>       

                                <td>

                                    <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                                </td>
                              
                            </tr>
        
                                                   
                            @endforeach
                            
                            </div>
        
        

                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>




<div wire:ignore.self class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trabajos realizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('change.jobs') }}">
                   
                    @csrf

                 

            
                    <input type="hidden" name="idWorker" wire:model="idWorker">
                  
                    <input type="text" name="check" value="{{$check}}">

                <div class="form-group">

                    <p class="font-weight-bold">Trabajos</p>
                    
                    @foreach ($jobNew as $index => $item)

                    @foreach ($details as $key => $jobs)
                        

                 
                        
                   
                    @if ($jobs->id == $item->presupuesto_details_id)
                        
                 
                        
                   
                    <tr>
                    
                        <td scope="row">
                       
                        <input class="form-check-input ml-4"
                        type="checkbox" name="job[{{ $key }}]"
                         value="{{$jobs->id}}" checked>
                        {{$jobs->trabajo}}


                        
                        </td>

                        <td>

                            <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                        </td>
                    
                      
                    </tr>

                    @elseif($jobs->id != $item->presupuesto_details_id)


                    <tr>
                    
                        <td scope="row">
                       
                        <input class="form-check-input ml-4"
                        type="checkbox" name="job[{{ $key }}]"
                         value="{{$jobs->id}}" >
                  
                        
                        </td>

                        
                        <td>

                            <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                        </td>
                      
                    </tr>

                    @endif
                  
                    @endforeach
                    
                    @endforeach
              
                    </div>



                    
                    

                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>