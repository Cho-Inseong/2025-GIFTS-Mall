// B모듈 모토
function motto() {
  const images = [
    "url('../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/나눔혁신.jpg')",
    "url('../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/미래혁신.jpg')",
    "url('../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/보안혁신.jpg')",
    "url('../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/신뢰혁신.jpg')",
    "url('../[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/B-Module/환경혁신.jpg')",
  ];

  const pIntext = [
    "고객신뢰를 바탕으로 행복한 사회를 추구하는 글로벌 기업",
    "기업의 가치 혁신의 출발은 나눔을 시작으로 고객 가치를 탐험한다.",
    "세계 기후변화 대응을 위해 100% 재생에너지로 생산된 제품만 선별한다.",
    "다른 생각 다른 미래, 플랫폼 기반의 글로벌 미래 혁신을 선도한다.",
    "글로벌 수준의 개인정보보호 및 보안 체계를 유지한다.",
  ];

  const mottoParts = $(".motto-parts");

  // 초기 이미지 설정
  mottoParts.each((index, element) => {
    $(element).css({
      "background-image": images[index],
      "background-size": "1250px auto",
      "background-position": "center",
    });
  });

  // hover 시: 해당 div의 이미지를 전체 화면으로 변경
  mottoParts.mouseover(function () {
    const index = $(this).index(); // hover된 div의 index
    const imageUrl = images[index]; // hover된 div의 이미지 URL

    mottoParts.each((i, element) => {
      // 각 div에 이미지와 텍스트 적용
      $(element).css({
        "background-image": imageUrl,
        "background-size": "1250px auto",
        "background-position": `${-i * 250}px 0`, // 각 div 위치 조정
      });

      // p 태그가 이미 존재하는 경우 삭제 후 추가
      $(element).find("p").remove();

      // 현재 hover된 div에만 p 태그 추가
      if (i === index) {
        $(element).append(`<p>${pIntext[index]}</p>`);
      }
    });
  });

  // mouseleave 시 원래 상태로 복귀
  mottoParts.mouseleave(function () {
    mottoParts.each((index, element) => {
      $(element).css({
        "background-image": images[index],
        "background-size": "1250px auto",
        "background-position": "center",
      });
      $(element).find("p").remove(); // p 태그 제거
    });
  });
}

$(document).ready(function () {
  motto(); // 페이지 로드 후 motto 함수 실행
});
// B모듈 비디오
function v_play(elem) {
  const elem_text = elem.innerText;
  const all_video = $("#all_video")[0]; //여기서 첫번째 객체라고 정의하면 밑에 get(0) 안붙여도 ok~
  switch (elem_text) {
    case "재생하기":
      all_video.play();
      break;
    case "일시정지":
      all_video.pause();
      break;
    case "정지":
      all_video.pause();
      all_video.currentTime = 0;
      break;
    case "되감기":
      all_video.currentTime -= 10;
      break;
    case "빨리감기":
      all_video.currentTime += 10;
      break;
    case "감속하기":
      all_video.playbackRate -= 0.1;
      break;
    case "배속하기":
      all_video.playbackRate += 0.1;
      break;
    case "배속 초기화":
      all_video.playbackRate = 1;
      break;
    case "컨트롤러 숨기기":
      $(".btn-group").find(".video-btn:not(#c-h-btn)").hide();
      $("#c-h-btn").text("컨트롤러 보이기");
      break;
    case "컨트롤러 보이기":
      $(".btn-group").find(".video-btn:not(#c-h-btn)").show();
      $("#c-h-btn").text("컨트롤러 숨기기");
      break;
    case "반복 켜기":
      all_video.loop = true;
      elem.innerText = "반복 끄기";
      break;
    case "반복 끄기":
      all_video.loop = false;
      elem.innerText = "반복 켜기";
      break;
    case "자동재생 켜기":
      all_video.loop = true;
      elem.innerText = "자동재생 끄기";
      break;
    case "자동재생 끄기":
      all_video.loop = false;
      elem.innerText = "자동재생 켜기";
      break;
  }
}

// 비회원 주문하기
function show_modal() {
  $("#modal").modal("show");
}

// 랜덤 ID만들기
function random_id(length = 6) {
  const characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let result = "";
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * characters.length);
    result += characters[randomIndex];
  }
  $("#random_id").val(result);
}

// 모달 상품 띄우기
function products_data() {
  return $.getJSON(
    "./[2025년 지방] 웹디자인및개발 (과제)/선수제공파일/A-Module/products_data.json"
  ).then(function (data) {
    return data["data"];
  });
}

function show_all_products() {
  products_data().then(function (products_data) {
    // 여기 안에서 짝짝쿵쿵쿵 ㅇㅋ?
  });
}

// 비회우너 주문하기 말고 c먼저

// 비회원 주문하기 끝

// C모듈

// 회원가입
function show_sign_up_modal() {
  $("#sign_up_modal").modal("show");
}

function sign_up() {
  const user_id = $("#user_id").val();
  const user_pw = $("#user_pw").val();
  const user_name = $("#user_name").val();
  const user_email = $("#user_email").val();

  $.post("./sign_up", {
    user_id: user_id,
    user_pw: user_pw,
    user_name: user_name,
    user_email: user_email,
  }).done(function (data) {
    if (typeof data == "string") {
      try {
        data = JSON.parse(data);
      } catch (e) {
        alert("서버 응답 오류: JSON변환 실패");
        console.error("JSON Parse Error", e, data);
        return;
      }
    }

    if (data.success) {
      alert(data.message);
      location.href = "./";
    } else {
      alert(data.message);
      console.log(data.error);
      location.reload();
    }
  });
}

// 로그인
function show_sign_in_modal() {
  $("#sign_in_modal").modal("show");
}

function sign_in() {
  const user_id = $("#user_id_in").val();
  const user_pw = $("#user_pw_in").val();

  $.post("./sign_in", {
    user_id: user_id,
    user_pw: user_pw,
  }).done(function (data) {
    if (typeof data == "string") {
      try {
        data = JSON.parse(data);
      } catch (e) {
        alert("JSON객체 변환 실패 엣큥");
        console.error("JSON Parse Error", e, data);
        return;
      }
    }

    if (data.success) {
      alert(data.message);
      location.reload();
    } else {
      alert(data.message);
      console.log(data.error);
      location.reload();
    }
  });
}

// 전체상품 페이지에 로드하기
function category_select(elem) {
  const elem_text = $(elem).text(); // 버튼의 텍스트(카테고리명) 가져오기

  $.post(
    "./all_products_add_api",
    { category: elem_text },
    function (response) {
      const data = JSON.parse(response); // 서버에서 받은 JSON 데이터 파싱

      // 인기 상품은 .popular div에 출력
      $(".popular").html(data.popular);

      // 일반 상품은 #detail_boxes div에 출력
      $("#detail_boxes").html(data.normal);
    }
  ).fail(function () {
    console.error("카테고리 데이터를 불러오는 데 실패했습니다.");
  });
}

//장바구니 추가
function s_p_c_a(elem) {
  const goods_idx = elem;

  $.post("./add_shopping_cart_api", {
    goods_idx: goods_idx,
  }).done(function (data) {
    if (typeof data == "string") {
      try {
        data = JSON.parse(data);
      } catch (e) {
        alert("JSON객체 변환 실패");
        console.error("JSON Parse Error", e, data);
        return;
      }
    }
    if (data.success) {
      alert(data.message);
      // location.reload();
    } else {
      alert(data.message);
      console.log(data.error);
      location.reload();
    }
  });
}

// 장바구니
// function total_price() {
//   const goods_price = $(".goods_price").attr("id")
//   const stock = $(".goods_stock").val();

//   let total_price = goods_price * stock

//   $(".total_price").text(total_price)

// console.log(stock);
// }

function total_price(el) {
  const row = $(el).closest("tr"); // 현재 행 선택
  const goods_idx = row.attr("id");
  const goods_price = parseInt(row.find(".goods_price").attr("id")); // 해당 행의 가격 가져오기
  const stock = parseInt(row.find(".goods_stock").val()) || 0; // 수량이 없을 경우 0 처리

  let total_price = goods_price * stock;
  row.find(".total_price").text(total_price.toLocaleString() + "원"); // 형식 적용

  let total_total_price = 0;
  
  $(".total_price").each(function () {
      let price = parseInt($(this).text().replace(/[^0-9]/g, "")) || 0; // "1,000원" -> 1000 변환
      total_total_price += price;
  });

  $(".total_total_price").text(`총금액: ${total_total_price.toLocaleString()}원`);

  $.post("./stock_update_api", {
    spc_stock: stock,
    goods_idx: goods_idx,
  }).done(function (data) {
    if (typeof data == "string") {
      try {
        data = JSON.parse(data);
      } catch (e) {
        alert("JSON객체 변환 실패");
        console.error("JSON Parse Error", e, data)
        return
      }
    }

    if (data.success) {
      console.log(data.message);
    } else {
      console.log(data.message);
      console.error(data.error);
      location.reload();
    }
  });
}
