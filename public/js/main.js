$(document).ready(function(){
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
		})
		.finally(function () {
			console.log('finally');
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
		})
		.finally(function () {
			console.log('finally');
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
			})
			.finally(function () {
				console.log('finally');
			});
		}
	});

});

function createTempSkno(){
	var Model = $("#SK_create").val();
	if(!Model){
		alert("請先輸入型號！");
		return;
	}
	url = '/prod_base_search/' + Model;
	axios.get('/prod_base_search/' + Model )
	.then(function (response) {
		let data = response.data;
		if(data.length){
			$("#checkTempSkno").html(Model + '已經存在，無法重複建立！');
		}else{
			$("#checkTempSkno").empty();
			$("input[name=SK_NO4]").val(Model + "_temp");	
		}
	})
	.catch(function (error) {
		console.log(error);
	})
	.finally(function () {
		console.log('finally');
	});

}