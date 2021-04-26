@extends('backend.master')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sửa quyền') }}</div>
                    
                <div class="card-body">
                   <form action="" method="POST" role="form">
                        @csrf
                    
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$admin['name']}}" required autofocus>

                               
                            </div>
                           
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$admin['email']}}" required>

                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cấp Quyền') }}</label>
                            <div class="col-md-6">
                                 
                                <select class="form-control" style="width:200px;float: left; " multiple="multiple" name="role[]">
                               @foreach ($roles as $row)
                                <option 
                                    {{ $listroleofuser->contains($row->id) ? 'selected' : '' }}
                                value="{{$row['id']}}">
                                {{$row["Description"] }}
                            </option>
                                @endforeach
                                 </select>
                             </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Sửa
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
