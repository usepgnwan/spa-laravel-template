<div class="row">
    <div class="col-12">
        <form action="{{route('category.post')}}">
            @method('POST')
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value={{ $data['id'] ?? "add"}} >
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" value='{{ $data['description'] ?? ""}}' >
                </div>
            </div> 
            <div class="mb-3"> 
                <div>
                    <label for="">Asset</label>
                    <select name="asset" id="asset" class="cst-select2"  data-placeholder="Choose one thing">
                        <option ></option>
                        @foreach ($asset as $item)
                            <option value="{{ $item['id'] }}"  @if(isset( $data['asset_id']) && $item['id'] == $data['asset_id']) selected @endif> {{$item['description']}} </option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="mb-3"> 
                <div>
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value='{{ $data['jumlah'] ?? "0" }}' >
                </div>
            </div> 
        </form>
    </div>
</div>
 