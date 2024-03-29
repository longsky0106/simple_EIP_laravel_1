
      @vite('resources/css/app.css')

<div id="spec_input_content" class="flex flex-wrap w-full">
			
	<div id="zh-tw_spec" class="flex-1">
        <div class="spec_input_title flex w-full">
            <div id="title_tw" class="flex-1 text-center">中文</div><div id="title_example" class="hidden sm:block w-24">帶入範例</div>
        </div>	
        <div class="flex w-full p-1">
			<label class="flex items-center w-24" for="spec_item_name">銷售品名</label>
			<input class="flex-1 input input-sm sm:input-md input-bordered" type="text" id="" name="name_for_sell_tw" value="">
        </div>

        @foreach($MenuSpecItems as $key => $MenuSpecItem)
            <div class="flex w-full p-1">
                <label class="flex items-center w-24" for="spec_item_name">{{$MenuSpecItem->spec_item_name}}</label><!-- 規格項目標題 -->
                <input class="flex-1 input input-sm sm:input-md input-bordered" type="text" id="" name="{{$MenuSpecItem->spec_item_name_form}}" value=""> <!-- 規格項目數值 -->
            
                <div class="example_content ex_tw hidden sm:flex">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn1_tw" value="1" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 1, 'tw');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn2_tw" value="2" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 2, 'tw');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn3_tw" value="3" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 3, 'tw');">
                </div>
            </div>    
        @endforeach
	</div>
    <hr class="hidden sm:block w-full mt-5 mb-5">
	<div id="en-us_spec" class="flex-1">
		<div class="spec_input_title flex w-full">
            <div id="title_en" class="flex-1 text-center">英文</div><div id="title_example" class="w-24">帶入範例</div>
        </div>
        <div class="flex p-1">
            <label class="hidden sm:flex items-center w-40" for="spec_item_name">Marketable Product Name</label>
            <input class="flex-1 w-[calc(100%-6rem)] sm:w-[calc(100%-16rem)] input input-sm sm:input-md input-bordered" type="text" id="" name="name_for_sell_en" value="" maxlength="60">
        </div>	
        @foreach($MenuSpecItems as $key => $MenuSpecItem)
            <div class="flex p-1" >
                <label class="hidden sm:flex items-center w-40" for="spec_item_name_en">{{$MenuSpecItem->spec_item_name_en}}</label>
                <input class="flex-1 input input-sm sm:input-md input-bordered" type="text" id="" name="{{$MenuSpecItem->spec_item_name_form}}_en" value="">
                    
                <!-- 帶入範例值的按鈕 -->
                <div class="example_content hidden sm:flex ex_en w-24 items-center">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn1_en" value="1" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 1, 'en');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn2_en" value="2" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 2, 'en');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn3_en" value="3" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 3, 'en');">
                </div>
                <div class="example_content flex sm:hidden ex_both w-24 items-center">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn1_both" value="1" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 1, 'both');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn2_both" value="2" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 2, 'both');">
                    <input type="button" class="example_btn btn btn-sm h-7 min-h-6 w-7 flex-1 ml-[0.12rem] mr-[0.12rem] rounded-md bg-slate-400 hover:bg-slate-500" 
                        name="{{$MenuSpecItem->spec_item_name_form}}_ex_btn3_both" value="3" 
                        onclick="spec_example_add_input({{$MenuSpecItem->spec_item_name_form}}, 3, 'both');">
                </div>
            </div>
        @endforeach    
	</div>
				
</div>