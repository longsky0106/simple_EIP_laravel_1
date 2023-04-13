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
		
		@vite('resources/css/app.css')
        
		<style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>



    </head>
    <body>
		<div id="search_bar_L" class="flex items-center">

			<form class="flex" action="{{ url()->current() }}" method="GET">
				<input type="text" name="search_text" value="{{ $search_text }}" class="p-[0.2em]" placeholder="請輸入產品型號">
				<button type="submit" class="bg-cyan-900 hover:bg-cyan-700 text-white pl-2 pr-2 pt-1 pb-1 mr-2 rounded">搜尋</button>
			</form>

			 每頁顯示數量
			  <form action="{{ url()->current() }}" method="GET">
				<select class="pt-[0.2em] pb-[0.2em] pl-[0.5em] pr-[2.15rem] hover:bg-slate-200" name="per_page" onchange="this.form.submit()">
					<!-- 如果GET url的per_page為10然後 => $perPage，就將選定該述職的選項 -->
					<option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
					<option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
					<option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
					<option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
				</select>
			</form>
			  
			 
				@if($DataProdsReference->count())
					<!-- 將網址中per_page的數值傳遞到$perPage之後再傳給links() -->
					{{$DataProdsReference->appends(['per_page' => $perPage])->onEachSide(1)->links()}}
				@else
					查無任何資料
				@endif

	  </div>
		<hr>
		<div id="main_content_L" class="border border-black">
			<div class="data_room_con0_L flex"><!-- pro_con_L: 欄，dr: 列 -->
				<form method="GET" action="{{ route('ProductDataManage.create') }}">
					<button class="bg-slate-100 border-l border-b border-r border-black hover:bg-slate-200 pl-2 pr-2 pt-1 pb-1 mr-2 rounded" type="submit">新增一筆資料</button>
				</form>
				<!-- <button type="" name="" value="">更新所選資料</button> -->
				<form method="GET" action="">
					<button id="delete_btn" class="bg-red-600 hover:bg-red-800 text-white pl-2 pr-2 pt-1 pb-1 mr-2 rounded opacity-25" type="" name="" value="" onclick="btn_delete_prod()" disabled>刪除所選資料</button>
				</form>
			</div>
			<div class="data_room_L">
				<div class="flex">
					<div class="flex flex-row h-full">
						<div class="flex-[3] min-w-[2em] w-full h-full 
									border-[1px] inline-block
									border-[#D4AEAE] bg-[#a16872] 
									text-white font-bold"
						>
							編號
						</div>
						<div class="w-[2.2em] h-full inline-block border-[1px] 
									border-[#D4AEAE] bg-[#a16872] 
									text-white font-bold"
						>
							選擇
						</div>
					</div>
					<div class="flex flex-1 h-full">
						<div class="w-16 h-full inline-block border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold" 
						>
							圖片
						</div>
						<div class="w-32 h-full inline-block border-[1px]
								border-[#D4AEAE] bg-[#a16872]
								text-white font-bold" 
						>
							型號 / 料號
						</div>
						<div class="w-36 h-full inline-block border-[1px]
								border-[#D4AEAE] bg-[#a16872]
								text-white font-bold" 
						>
							產品分類
						</div>
						<div class="min-w-[14em] w-full inline-block 
									flex-[50] border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold overflow-x-auto" >
									品名
						</div>
						<div class="w-[4.2em] inline-block border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold" >官網頁面
						</div>
						<div class="w-32 inline-block border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold" >售價與成本
						</div>
						<div class="w-12 inline-block border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold" >庫存
						</div>
						<div class="w-28 inline-block border-[1px]
									border-[#D4AEAE] bg-[#a16872]
									text-white font-bold" >銷售頁面範本
						</div>
					</div>
				</div>

				@foreach($DataProdsReference as $DataProdReference)
					@php($count= $loop->index + 1)

					<div class="flex flex-wrap h-16 mt-[0.2em] mb-[0.2em] leading-[1.25] font-[none]">
						<div class="flex">
							<div class="flex-[3] min-w-[2em] h-full 
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >編號</div>
								<div class="inline-block w-full h-full relative" >{{ $count }}</div>
							</div>
							<div class="w-[2.2em] h-full 
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >選擇</div>
								<div class="inline-block w-full h-full relative" 
									id="list_no<?=$DataProdReference?>" >
									<input type="checkbox" name="Data_Prod_Ref_ID[]" value="{{ $DataProdReference->ID }}" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="flex flex-[18] flex-wrap h-full">
							<div class="w-16 h-full 
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >圖片</div>
								<div class="flex w-full h-full relative" >
									<div class="border-2 border-[#9e9e9f] m-[5px]
												text-base text-[#9e9e9f] text-center rounded-md p-[2px]">暫無圖片</div>
								</div>
							</div>
							<div class="w-32 h-full overflow-x-auto border-[1px] 
										border-[#D4AEAE]">
								<div class="hidden" >型號/料號</div>
								<div class="inline-block w-full h-full relative" >
									<div id="">
										<a href="javascript:prod_data_edit('{{ $DataProdReference->Model }}');">{{ $DataProdReference->Model }}</a>
									</div>
									<div>{{ $DataProdReference->SK_NO1 }}</div>
								</div>
							</div>
							<div class="w-36 h-full border-[1px] border-[#D4AEAE]">
								<div class="hidden" >分類</div>
								<div class="inline-block w-full h-full relative" >
									{{ $DataProdReference->SK_USE?$DataProdReference->SK_USE.">".$DataProdReference->SK_LOCATE:"" }}
								</div>
							</div>
							<div class="min-w-[14em] h-full flex-[50] overflow-x-auto
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >品名</div>
								<div class="w-max inline-block relative" >
									<div>{{ $DataProdReference->fd_name }}</div><hr>
									<div>{{ $DataProdReference->SK_NAME?"廠內: ".$DataProdReference->SK_NAME:"" }}</div>
								</div>
							</div>
							<div class="w-16 h-full
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >官網頁面</div>
								<div class="inline-block w-full h-full relative" >
								
								</div>
							</div>
							<div class="w-32 h-full
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >售價與成本</div>
								<div class="inline-block w-full h-full relative" >
									<div>售價: <div class="m-auto float-right">{{ $DataProdReference->Price }}</div></div>
									<div>建議售價: <div class="m-auto float-right">{{ $DataProdReference->{'Suggested Price'} }}</div></div>
									<div>成本: <div class="m-auto float-right">{{ $DataProdReference->{'Cost Price'} }}</div></div>
								</div>
							</div>
							<div class="w-12 h-full
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >庫存</div>
								<div class="inline-block w-full h-full 
											relative text-end" >
											{{ round($DataProdReference->SPH_NowQtyByWare) }}
								</div>
							</div>
							<div class="w-28 h-full
										border-[1px] border-[#D4AEAE]">
								<div class="hidden" >銷售頁面範本</div>
								<div class="inline-block w-full h-full
											relative" >
								
								</div>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>
    </body>
</html>
