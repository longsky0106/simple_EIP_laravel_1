$(document).ready(function(){
	root_path = window.location.pathname;
	root_path = root_path.indexOf("php");
	alert(root_path);
	if(root_path){
		alert("false");
	}else{
		root_path = "";
		alert("true");
	}



	// 檢查該型號的基本資料(對照)是否已存在 PCT.dbo.Data_Prod_Reference
	function search_base_data(Model){

		axios.get('/prod_base_search/' + Model )
		.then(function (response) {
			let data = response.data;
			if(data.length){
				$("#check_Model").html(Model + '已經存在，無法重複建立！');
			}
			else
			{
				$("#check_Model").empty();
			}
		})
		.catch(function (error) {
			console.log(error);
		});
	}

	if($("#SK_create").length){
		$("#SK_create").focusout(function(){
			var Model = $("#SK_create").val();
			search_base_data(Model);
		});
	}

	/* 產品分類一 下拉選單異動 */
	$(document).on('change', '#categories', function(event){
		if(event.isDefaultPrevented()) return; // 防止重複關聯事件
		event.preventDefault(); // 防止重複關聯事件

		shop_menu1_id = $('#categories :selected').val();
		axios.get('/shop_menus2/' + shop_menu1_id )
		.then(function (response) {
			let data = response.data;
			$("#ProdType").html(data);
			// console.log(data)
		})
		.catch(function (error) {
			console.log(error);
		});
	});

	/* 產品分類二 下拉選單異動 */
	$(document).on('change', '#ProdType', function(event){
		if(event.isDefaultPrevented()) return; // 防止重複關聯事件
		event.preventDefault(); // 防止重複關聯事件
		// alert("ProdType change");
		// 取得規格索引值
		shop_menu2_id = $('#ProdType :selected').val();
	   
		// 取得目前上方查詢結果的料號
		var SK_NO = $("#sk_no1").text();

		if(shop_menu2_id != 0){
			// 送出AJAX資料到後端來取得規格項目
			axios.get('/MenuSpecItems/' + shop_menu2_id )
			.then(function (response) {
				let data = response.data;
				$("#spec_edit").html(data);
				$("#spec_content_title").html("<span><b>規格<b style=\"color:blue;\"> ( " + SK_NO + " )</b></b></span>");
				// console.log(data)
			})
			.catch(function (error) {
				console.log(error);
			});
		}
	});

});

function createTempSkno(){
	var Model = $("#SK_create").val();
	if(!Model){
		// alert("請先輸入型號！");
		$("#checkTempSkno").html("請先輸入型號！");
		return;
	}
	$("input[name=SK_NO4]").val(Model + "_temp");	
}

// 按下帶入範例按鈕
function spec_example_add_input(spec_item,n,lang){
	spec_item_name = spec_item.name;
	// 送出AJAX資料到後端來取得規格數值範例
	axios.get('/spec_item_example/' + spec_item_name + '/' + n + '/' + lang)
	.then(function (response) {
		let data = response.data;
		data = $.trim(data);
		if(data){
			if(lang == 'both'){
				spec_example_result = data.split('|');
				spec_example_result_tw = spec_example_result[0];
				spec_example_result_en = spec_example_result[1];
				
				if(spec_example_result_tw){
					$("input[name='"+ spec_item_name +"']").val(spec_example_result_tw);
				}
				
				if(spec_example_result_en){
					$("input[name='"+ spec_item_name +"_en']").val(spec_example_result_en);
				}
			}else{
				if(lang == 'tw'){
					$("input[name='"+ spec_item_name +"']").val(data);
				}else{
					$("input[name='"+ spec_item_name +"_en']").val(data);
				}
			}
		}
	})
	.catch(function (error) {
		console.log(error);
	});
}