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
    
  })
}

// 비회우너 주문하기 말고 c먼저

// 비회원 주문하기 끝
