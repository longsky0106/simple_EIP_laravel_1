﻿$(document).ready(function(){
	
	/* 產品分類一 下拉選單異動 */
	$(document).on('change', '#categories', function(event){
		if(event.isDefaultPrevented()) return; // 防止重複關聯事件
		event.preventDefault(); // 防止重複關聯事件

		shop_menu1_id = $('#categories :selected').val();
		axios.get('/shop_menus2/' + shop_menu1_id )
		.then(function (response) {
			let data = response.data;
			$("#ProdType").html(data);
			console.log(data)
		})
		.catch(function (error) {
			console.log(error);
		})
		.finally(function () {
			console.log('finally');
		});
		
		
	});

	/* 產品分類二 下拉選單異動 */
	$(document).on('change', '#ProdType', function(event){
		if(event.isDefaultPrevented()) return; // 防止重複關聯事件
		event.preventDefault(); // 防止重複關聯事件
		
		// 取得規格索引值
		shop_menu2_id = $('#ProdType :selected').val();
	   
		// 取得目前上方查詢結果的料號
		var SK_NO = $("#sk_no1").text();

		if(shop_menu2_id != 0){
			// 送出AJAX資料到後端來取得規格項目
			$.post(root_path + "../system/get_spec_item_from_menu.php", {
				shop_menu2_id: shop_menu2_id,
					SK_NO: SK_NO
					, check_pct_sql_temp: bUseTempSql
			}, function(result){
				$("#spec_edit").html(result);
				$("#spec_content_title").html("<span><b>規格<b style=\"color:blue;\"> ( " + SK_NO + " )</b></b></span>");
				
				if(typeof window_width_check === "function"){
					window_width_check();
				}
				
			});
		}
	});

});