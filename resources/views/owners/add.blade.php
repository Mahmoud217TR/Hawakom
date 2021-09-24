@extends('layouts.app')

@section('content')
<div class="container" style ="min-height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-9 float-right" style ="color:transparent">
                            {{ __(' ') }}
                        </div>
                        <div class="col-md-3 pr-0 pl-5 float-right">
                            {{ __('اضافة مصيف') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/addsite" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="site" class="col-md-3 col-form-label text-md-right">{{ __('موقع المصيف') }}</label>

                            <div class="col-md-7">
                                <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" dir="rtl" name="site" required autofocus>

                                @error('site')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="number_of_rooms" class="col-md-3 col-form-label text-md-right">{{ __('عدد الغرف') }}</label>

                            <div class="col-md-7">
                                <input id="number_of_rooms" type="number" class="form-control @error('number_of_rooms') is-invalid @enderror" min=1 dir="rtl" name="number_of_rooms" required>

                                @error('number_of_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="fare" class="col-md-3 col-form-label text-md-right">{{ __('الاجرة') }}</label>

                            <div class="col-md-7">
                                <input id="fare" type="number" class="form-control @error('fare') is-invalid @enderror" dir="rtl" name="fare" required min=0>

                                @error('fare')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="extra" class="col-md-3 col-form-label text-md-right">{{ __('ميزات اضافية') }}</label>
                
                            <div class="col-md-7">
                                <textarea id="extra" class="form-control" name="extra" style ="resize: none;height:100px" dir="rtl" required></textarea> 
                            </div>
                        </div>
                        
                        <div class="form-group d-flex flex-row-reverse">
                            <label for="num" class="col-md-3 col-form-label text-md-right">{{ __('عدد فترات الحجوزات') }}</label>

                            <div class="col-md-7">
                                <input id="num" type="number" class="form-control @error('num') is-invalid @enderror" dir="rtl" min=1 name="num" required >

                                @error('num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="cates" class="col-md-4 col-form-label text-md-right">{{ __('تصنيفات') }}</label>
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">

                            <!-- Latest compiled and minified JavaScript -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>

                            <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>
                            <div class="col-md-6">
                                <select id="cates" class="selectpicker" multiple style="background-color: #ecebeb;color: #2b2b2b" name ="cates[]">
                                    @foreach(\App\Models\Category::all() as $c)
                                        <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                    @endforeach

                                </select>
                                <script>  $(function () {
                                        $('cates').selectpicker();
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row-reverse">
                            <label for="pic" class="col-md-3 col-form-label text-md-right">{{ __('صور عن المصيف') }}</label>
                        </div>
                        <div class="form-group d-flex row ml-5">
                        
                            <div class="col-md-5 ml-5">
                            
                                <input id="pic" type="file"  class=" file-input form-control @error('pic') is-invalid @enderror" name="pic[]" multiple="multiple" >
                                
                                @error('pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                            <button class="add-more btn btn-primary">إضافة صورة أخرى</button>
                            <script>
                                // Get references to the "add more" button and the file input
                                    var addMore = document.querySelector('.add-more')
                                    var fileInput = document.querySelector('.file-input')

                                    // When the button got clicked...
                                    addMore.addEventListener('click', function (event) {
                                        
                                    // Prevent the default action, which would be
                                    // the form submission for a button
                                    event.preventDefault()
                                    
                                    // Create a clone of the file input (you could also
                                    // create a new one from scrath, but then you'd
                                    // have to manually add the attributes and all...)
                                    var newFileInput = fileInput.cloneNode()
                                    
                                    // Insert the clone right after the original (this
                                    // can only be done inderectly)
                                    fileInput.parentNode.insertBefore(
                                        newFileInput,
                                        fileInput.nextSibling
                                    )
                                    
                                    // Set the file input reference to the clone, so 
                                    // that the next input will be added after the
                                    // new input
                                    fileInput = newFileInput
                                    fileInput.value =""
                                    })
                            </script>
                            </div>
                            
                        </div>

                        <div class="form-group d-flex flex-row-reverse mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('اضافة') }}
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
