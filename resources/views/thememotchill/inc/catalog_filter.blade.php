<form id="form-filter" method="GET" action="/">
    <div class="filter-box mt-3">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <select name="filter[sort]" form="form-filter" class="input form-control" id="order">
                    <option value="">Sắp xếp</option>
                    <option value="update" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'update') selected @endif>Thời gian cập nhật</option>
                    <option value="create" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'create') selected @endif>Thời gian đăng</option>
                    <option value="year" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'year') selected @endif>Năm sản xuất</option>
                    <option value="view" @if (isset(request('filter')['sort']) && request('filter')['sort'] == 'view') selected @endif>Lượt xem</option>
                </select>
            </div>
            <div class="col-lg-4 col-xs-6">
                <select name="filter[type]" form="form-filter" class="input form-control" id="type">
                    <option value="">Định dạng</option>
                    <option value="series" @if (isset(request('filter')['type']) && request('filter')['type'] == 'series') selected @endif>Phim bộ</option>
                    <option value="single" @if (isset(request('filter')['type']) && request('filter')['type'] == 'single') selected @endif>Phim lẻ</option>
                </select>
            </div>
            <div class="col-lg-4 col-xs-6">
                <select name="filter[category]" form="form-filter" class="input form-control" id="cat_id">
                    <option value="">Thể loại</option>
                    @foreach (\KKPhim\Core\Models\Category::fromCache()->all() as $item)
                        <option value="{{ $item->id }}" @if (
                            (isset(request('filter')['category']) && request('filter')['category'] == $item->id) ||
                                (isset($category) && $category->id == $item->id)) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 col-xs-6">
                <select name="filter[region]" form="form-filter" class="input form-control" id="city_id">
                    <option value="">Quốc gia</option>
                    @foreach (\KKPhim\Core\Models\Region::fromCache()->all() as $item)
                        <option value="{{ $item->id }}" @if (
                            (isset(request('filter')['region']) && request('filter')['region'] == $item->id) ||
                                (isset($region) && $region->id == $item->id)) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 col-xs-6">
                <select name="filter[year]" form="form-filter" class="input form-control" id="year">
                    <option value="">Năm</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" @if (isset(request('filter')['year']) && request('filter')['year'] == $year) selected @endif>
                            {{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 col-xs-6">
                <input form="form-filter" type="submit" class="btn-submit btn-block" value="Lọc phim">
            </div>
        </div>
    </div>
</form>
