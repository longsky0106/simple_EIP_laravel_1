<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>簡易EIP Laravel版</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>
		
		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<script src="{{ asset('js/main.js')}}"></script>

		@vite('resources/css/app.css')
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <body>
		<div style="margin:0 0 0.8em 0"><span style="color:blue;font-size:26px;"><b>銘鵬規格小幫手Web-資料新增</b></span></div>
		<form action="{{ route('ProductDataManage.store') }}" method="post">
			<label style="font-size:1.2em;color:red;font-weight:bold;">型號
				<input type="Text" id="SK_create" name="create_Model" placeholder="請輸入要新增的型號" style="margin:0 1em;height: 1.2em;width: fit-content;" autocomplete="off">
			</label>
		
			@csrf
			<div id="show_data">
			
				<span><b>基本資料</b></span><br>
					料號1(主要)<input class="input input-sm input-bordered" type="text" id="" name="SK_NO1" value=""><br>
					料號2(次要)<input class="input input-sm input-bordered" type="text" id="" name="SK_NO2" value=""><br>
					料號3(備用)<input class="input input-sm input-bordered" type="text" id="" name="SK_NO3" value=""><br>
					料號4(臨時)<input class="input input-sm input-bordered" type="text" id="" name="SK_NO4" value="">
					<input type="button" id="SK_NO_TEMP_add_btn" class="bg-slate-100 border-l border-b border-r border-black hover:bg-slate-200 pl-2 pr-2 pt-1 pb-1 mr-2 rounded" value="新增" onClick="">
					<br>
					售價&emsp;&emsp;<input class="input input-sm input-bordered" type="text" id="" name="Price" value=""><br>
					建議售價<input class="input input-sm input-bordered" type="text" id="" name="Suggested_Price" value=""><br>
					成本&emsp;&emsp;<input class="input input-sm input-bordered" type="text" id="" name="Cost_Price" value=""><br>
					<br>
			

			</div>

			<br>
			<hr>
			<span><b>產品分類</b></span><br>
			<div id="prod_data">
				目前產品分類: <br>
				修改產品分類: <select class="select select-bordered select-sm max-w-xs" id="categories" name="categories">
									<option value="0">選擇產品系列</option>
									@foreach($shopMenus1 as $shopMenu1)
										<option value="{{$shopMenu1->shop_menu1_id}}">{{$shopMenu1->shop_menu1_name}}</option>
									@endforeach
								</select>
								<select class="select select-bordered select-sm max-w-xs" id="ProdType" name="ProdType">
									<option value="0">選擇產品類別</option>
								</select><br />
			</div>

			<hr>
			<div id="spec_content_title">
				<span><b>規格(請先設定產品分類才能顯示完整規格列表)</b></span>
			</div>
			
			<div id="spec_edit">

					擴充座輸出介面:
					<div id="spec_port">
						<div>
							<input id="port_HDMI" title="HDMI" class="checkbox_spec_port" type="checkbox" autocomplete="off">
							<label for="port_HDMI">
								HDMI
							</label>
						</div>
						<div>
							<input id="port_DisplayPort" class="checkbox_spec_port" type="checkbox" autocomplete="off">
							<label for="port_DisplayPort">
								DisplayPort
							</label>
						</div>
						<div>
							<input id="port_DVI" class="checkbox_spec_port" type="checkbox" autocomplete="off">
							<label for="port_DVI">
								DVI
							</label>
						</div>
						<div>
							<input id="port_VGA" class="checkbox_spec_port" type="checkbox" autocomplete="off">
							<label for="port_VGA">
								VGA
							</label>
						</div>
					</div>
					<div id="spec_input_content">
					
						<div id="zh-tw_spec" class="spec_input_aren">
							<div class="spec_input_title">中文</div>				
							<label for="spec_item_name">型號</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value[]" value=""><br>				
							<label for="spec_item_name">功能</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value[]" value=""><br>				
							<label for="spec_item_name">輸入埠</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value[]" value=""><br>				
							<label for="spec_item_name">輸出埠</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value[]" value=""><br>
						</div>
						
						<div id="en-us_spec" class="spec_input_aren">
							<div class="spec_input_title">英文</div>					
							<label for="spec_item_name">Model</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value_en[]" value=""><br>										
							<label for="spec_item_name">Founction</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value_en[]" value=""><br>										
							<label for="spec_item_name">Input</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value_en[]" value=""><br>										
							<label for="spec_item_name">Output</label>
							<input class="input input-sm input-bordered" type="text" id="" name="spec_item_value_en[]" value=""><br>
						</div>
					</div>
				<!-- <input type="button" value="新增項目" onclick=";"><br> -->
				<!-- &emsp;<input type="button" value="新增已存在項目到現有產品分類下" onclick=";"><br> -->
				<!-- &emsp;<input type="button" value="新增一筆新項目到現有產品分類下" onclick=";"> -->
			</div>
				</br>
				<hr>
				<span><b>產品描述&特色</b></span><br>
				<div id="description_features_edit">
					<div id="description_input_content">
						<div id="zh-tw_description" class="description_input_aren">
							<div class="description_input_title">描述</div>
							<div id="description_input_right" class="text_input_aren">
									<label for="description">中文</label>
									<textarea rows="8" cols="20" name="zh-tw_description" autocomplete="off"></textarea>
									<hr>
									<label for="description_en">英文</label>
									<textarea rows="8" cols="20" name="en-us_description" autocomplete="off"></textarea>
							</div>
						</div>		
						<div id="zh-tw_features" class="features_input_aren">
							<div class="features_input_title">特色</div>
							<div id="features_input_right" class="text_input_aren">
									<label for="features">中文</label>
									<textarea rows="8" cols="20" name="zh-tw_features" autocomplete="off"></textarea>
									<hr>
									<label for="features_en">英文</label>
									<textarea rows="8" cols="20" name="en-us_features" autocomplete="off"></textarea>
							</div>
					</div>
					<input type="button" id="button_update_data" value="更新/儲存  規格描述資料" onClick="update_submit('');">
					<button class="bg-slate-100 border-l border-b border-r
								   border-black hover:bg-slate-200 pl-2 
								   pr-2 pt-1 pb-1 mr-2 rounded" type="submit"
					>
						新增一筆資料
					</button>
				</div>
		</form>
		<br><span style="color:rgb(47, 47, 65);" id="statu_insert_check"></span>
		<br><span id="statu_base_temp"></span>
		<br><span id="statu_base_check"></span>
	  </br>
    </body>
</html>
