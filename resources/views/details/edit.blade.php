@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script src="/js/app.js"></script>
<link rel="stylesheet" href="/css/app.css">

@section('content')
    <div class="page-wrapper">
    <div class="container">
        <br>
        <h2>{{ $quotation->name }}</h2>
        <form action="{{ route('details.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-lg btn-primary btn-save">Save</button>
            <div class="total-container" id="total-container" >
                <h2><strong><span id="grand-total" class="grand-total">0.00</span></strong></h2>
            </div>

            <br>
            <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
            <div class="table-wrapper-scroll-y">
            <table class="table table-light table-bordered table-hover table-sm table-scrollable">
                <thead class="thead sticky-top">
                <tr>
                    <th class="text-center">Part number</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Width</th>
                    <th class="text-center">Length</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Laser</th>
                    <th class="text-center">Laser type</th>
                    <th class="text-center">Weld</th>
                    <th class="text-center">Weld type</th>
                    <th class="text-center">Press</th>
                    <th class="text-center">Saw</th>
                    <th class="text-center">Drill</th>
                    <th class="text-center">Clean</th>
                    <th class="text-center">Paint</th>
                    <th class="text-center">Pipe Thread</th>
                    <th class="text-center">Pipe Engage</th>
                    <th class="text-center">Press Setup</th>
                    <th class="text-center">Total</th>
                    <th>LHC</th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < 70; $i++)
                    <tr>
                        <td contenteditable="false" id="partnumber_select[]" style="width: 190px;">
                            <select class="form-control" name="partnumber_select[]">
                                <option value=""></option>
                                @foreach ($partnumbers as $partnumber)
                                    <option value="{{ $partnumber }}">{{ $partnumber->partnumber }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td contenteditable="true" id="description[{{$i}}]"></td>
                        <td contenteditable="true" id="width[{{$i}}]"></td>
                        <td contenteditable="true" id="length[{{$i}}]"></td>
                        <td contenteditable="true" id="quantity[{{$i}}]"></td>
                        <td class="laser" contenteditable="false" id="laser[{{$i}}]"></td>
                        <td contenteditable="false" id="laser[]">
                            <select class="form-control" name="laser_select[]" style="width: 100%">
                                <option value=""></option>
                                @foreach ($lasers as $laser)
                                    <option value="{{ $laser }}">{{ $laser->lasertype }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td contenteditable="true" id="weld[]"></td>
                        <td contenteditable="false" id="weldtype[]">
                            <select class="form-control" name="weld_select[]" style="width: 100%">
                                <option value=""></option>
                                @foreach ($welds as $weld)
                                    <option value="{{ $weld }}">{{ $weld->weldtype }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td contenteditable="true" id="press[{{$i}}]"></td>
                        <td contenteditable="true" id="saw[{{$i}}]"></td>
                        <td contenteditable="true" id="drill[{{$i}}]"></td>
                        <td contenteditable="true" id="clean[{{$i}}]"></td>
                        <td contenteditable="true" id="paint[{{$i}}]"></td>
                        <td contenteditable="false" id="pipethread[{{$i}}]">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">45°</label>
                            </div>
                             <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Thread</label>
                            </div>
                        </td>
                        <td contenteditable="true" id="pipeengage[{{$i}}]"></td>
                        <td contenteditable="true" id="press_setup[{{$i}}]"></td>
                        <td class="total" contenteditable="false" id="total[{{$i}}]"></td>
                        <td><button class="btn btn-primary laser-hole-btn" data-row="{{$i}}">LHC</button></td>
                    </tr>



                    <div class="modal fade" id="laser-hole-modal" tabindex="-1" aria-labelledby="laser-hole-modal-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="laser-hole-modal-label">Laser Hole Calculator</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circle-dia-1" class="form-label">Circle Dia. 1</label>
                                                    <input type="number" class="form-control" id="circle-dia-1" name="circle-dia-1" min="0" step="any" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="qty-1" class="form-label">Quantity 1</label>
                                                    <input type="number" class="form-control" id="qty-1" name="qty-1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circumference-1" class="form-label">circumference 1</label>
                                                    <input type="number" class="form-control" id="circumference-1" name="circumference-1" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="total-1" class="form-label">Total Circle 1</label>
                                                    <input type="number" class="form-control" id="total-1" name="total-1" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circle-dia-2" class="form-label">Circle Dia. 2</label>
                                                    <input type="number" class="form-control" id="circle-dia-2" name="circle-dia-2" min="0" step="any" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="qty-2" class="form-label">Quantity 2</label>
                                                    <input type="number" class="form-control" id="qty-2" name="qty-2" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circumference-2" class="form-label">circumference 2</label>
                                                    <input type="number" class="form-control" id="circumference-2" name="circumference-2" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="total-2" class="form-label">Total Circle 2</label>
                                                    <input type="number" class="form-control" id="total-2" name="total-2" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circle-dia-3" class="form-label">Circle Dia. 3</label>
                                                    <input type="number" class="form-control" id="circle-dia-3" name="circle-dia-3" min="0" step="any" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="qty-3" class="form-label">Quantity 3</label>
                                                    <input type="number" class="form-control" id="qty-3" name="qty-3" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="circumference-3" class="form-label">circumference 3</label>
                                                    <input type="number" class="form-control" id="circumference-3" name="circumference-3" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="total-3" class="form-label">Total Circle 3</label>
                                                    <input type="number" class="form-control" id="total-3" name="total-3" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary calculate-btn">Calculate</button>
                                </div>
                            </div>
                        </div>
                    </div>




                @endfor
                </tbody>
            </table>
            </div>
        </form>

        <div class="row">
        <!--    <div class="col-md-2 col-md-offset-10">
                 <button id="add-row-btn" class="btn btn-primary">Add part number</button>
             </div> -->
        </div>
    </div>
    </div>

    <style>
        .page-wrapper {
            height: 100vh;
        }
        html, body {
            height: 100%;
        }
        .modal-open {
            overflow: hidden;
        }

        .modal {
            position: fixed !important;
        }
    </style>


@endsection
