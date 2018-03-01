 <form method="GET" action="{{ route('motors.search') }}">

<div class="row justify-content-center" >
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-3">
                        <label><i><b>Colors</b></i> </label>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="white"> white</label>
                            </div>
                           
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="black"> black</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="red"> Red</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="orang"> orang</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="blue"> blue</label>
                            </div>
                           
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="yellow"> yellow</label>
                            </div>
                           
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="colors[]" value="gray"> gray</label>
                            </div>
                           
                       
                    </div>
                   <div class="col-md-3">
                        <div class="form-group">
                            <label><i><b>Sort By</b></i></label>

                            <select class="form-control" name="sort">
                                <option value="price">Price</option>
                                <option value="created_at">Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                    <div class="form-group">
                        <label><i><b>Filter by price:</b></i></label>
                        <b>1 $</b>
                        <input 
                            id="ex2"
                            name="price" 
                            type="text" 
                            class="span2 form-control" 
                            data-slider-min="1" 
                            data-slider-max="1000" 
                            data-slider-step="5" 
                            data-slider-value="[1,500]"
                        />
                        <b> 1000 $</b>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width:18%;margin:0 0 7px 18px">Search</button>
            </div>
        </div>
        </form>


@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
    $(document).ready(function () {
        $("#ex2").slider({
           
        });
        $('.dropdown-toggle').dropdown()
    })
</script>
@endpush