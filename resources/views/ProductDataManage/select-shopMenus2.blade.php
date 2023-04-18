<option value="0">選擇產品類別</option>
@foreach($shopMenus2 as $key => $value)
    <option value="{{ $shopMenus2[$key]['shop_menu2_id'] }}>">{{ $shopMenus2[$key]['shop_menu2_name'] }}</option>
@endforeach