import { marked } from "marked";
// ==========================================================
// AIBEKU AI SCANNER
// ==========================================================

const scanPage = document.querySelector(".scan-page");

if (!scanPage) {

    console.log("Scan page not found.");

} else {

    // ==========================================================
    // ELEMENT
    // ==========================================================

    const button = document.querySelector("#cameraButton");

    const video = document.querySelector("#cameraVideo");

    const canvas = document.querySelector("#cameraCanvas");

    const ctx = canvas.getContext("2d");

    const placeholder = document.querySelector("#cameraPlaceholder");

    const statusText = document.querySelector("#cameraStatusText");

    const badge = document.querySelector("#aiStatusBadge");

    const statusDot = document.querySelector(".status-dot");

    // ==========================================================
    // AI STATE
    // ==========================================================

    const introState = document.querySelector("#introState");

    const loadingState = document.querySelector("#loadingState");

    const resultState = document.querySelector("#resultState");

    const detailState = document.querySelector("#detailState");

    // ==========================================================
    // RESULT
    // ==========================================================

    const objectResult = document.querySelector("#objectResult");

    const materialResult = document.querySelector("#materialResult");

    const categoryResult = document.querySelector("#categoryResult");

    const conditionResult = document.querySelector("#conditionResult");

    const recommendationList =
        document.querySelector("#recommendationList");

    // ==========================================================
    // DETAIL
    // ==========================================================

    const detailTitle =
        document.querySelector("#detailTitle");

    const detailDifficulty =
        document.querySelector("#detailDifficulty");

    const detailTime =
        document.querySelector("#detailTime");

    const detailTools =
        document.querySelector("#detailTools");

    const detailSteps =
        document.querySelector("#detailSteps");

    const backButton =
        document.querySelector("#backToIdeas");

    // ==========================================================
    // CHAT
    // ==========================================================

    const chatMessages =
        document.querySelector("#chatMessages");

    const chatInput =
        document.querySelector("#chatInput");

    const sendChat =
        document.querySelector("#sendChat");

    // ==========================================================
    // STATE
    // ==========================================================

    let stream = null;

    let step = "start";

    let currentRecommendations = [];

    // ==========================================================
    // UI
    // ==========================================================

    function hideAllStates() {

        introState.style.display = "none";

        loadingState.style.display = "none";

        resultState.style.display = "none";

        detailState.style.display = "none";

    }

    function showIntroState() {

        hideAllStates();

        introState.style.display = "block";

    }

    function showLoadingState() {

        hideAllStates();

        loadingState.style.display = "block";

    }

    function showResultState() {

        hideAllStates();

        resultState.style.display = "block";
        document.querySelector(".idea-section").style.display = "block";

        

    }

    function showDetailState() {

        hideAllStates();

        detailState.style.display = "block";

    }

    showIntroState();

    // ==========================================================
    // BADGE
    // ==========================================================

    function updateBadge(text, type) {

        badge.textContent = text;

        badge.className = `badge ${type}`;

    }

    function updateStatus(text, color) {

        statusText.textContent = text;

        statusDot.style.background = color;

    }

    // ==========================================================
    // ICON
    // ==========================================================

    function refreshIcons() {

        if (window.renderIcons) {

            window.renderIcons();

        }

    }

    refreshIcons();

        // ==========================================================
    // BUTTON EVENT
    // ==========================================================

    button.addEventListener("click", () => {

        switch (step) {

            case "start":
                initCamera();
                break;

            case "capture":
                capturePhoto();
                break;

            case "analyze":
                analyzePhoto();
                break;

            case "reset":
                resetScanner();
                break;

        }

    });

    // ==========================================================
    // DETAIL EVENT
    // ==========================================================

    backButton.addEventListener("click", () => {

        showResultState();

    });

    // ==========================================================
    // CAMERA
    // ==========================================================

    async function initCamera() {

        try {

            stream = await navigator.mediaDevices.getUserMedia({

                video: {

                    facingMode: "environment"

                }

            });

            video.srcObject = stream;

            video.style.display = "block";

            canvas.style.display = "none";

            placeholder.style.display = "none";

            updateStatus(
                "Kamera aktif",
                "#22C55E"
            );

            updateBadge(
                "Siap Memindai",
                "success"
            );

            button.disabled = false;

            button.innerHTML = `
                <i data-lucide="camera"></i>
                Ambil Foto
            `;

            refreshIcons();

            step = "capture";

        } catch (error) {

            console.error(error);

            alert("Kamera tidak dapat diakses.");

        }

    }

    // ==========================================================
    // CAPTURE
    // ==========================================================

    function capturePhoto() {

        canvas.width = video.videoWidth;

        canvas.height = video.videoHeight;

        ctx.drawImage(video, 0, 0);

        if (stream) {

            stream.getTracks().forEach(track => {

                track.stop();

            });

        }

        video.style.display = "none";

        canvas.style.display = "block";

        updateStatus(
            "Foto berhasil diambil",
            "#22C55E"
        );

        updateBadge(
            "Siap Dianalisis",
            "success"
        );

        button.innerHTML = `
            <i data-lucide="sparkles"></i>
            Analisis AI
        `;

        refreshIcons();

        step = "analyze";

    }

    // ==========================================================
    // RESET
    // ==========================================================

    function resetScanner() {

        canvas.style.display = "none";

        video.style.display = "none";

        placeholder.style.display = "flex";

        updateStatus(
            "Kamera belum aktif",
            "#EF4444"
        );

        updateBadge(
            "Menunggu Kamera",
            "waiting"
        );

        showIntroState();

        objectResult.textContent = "-";

        materialResult.textContent = "-";

        categoryResult.textContent = "-";

        conditionResult.textContent = "-";

        recommendationList.innerHTML = "";

        currentRecommendations = [];

        button.disabled = false;

        button.innerHTML = `
            <i data-lucide="camera"></i>
            Aktifkan Kamera
        `;

        refreshIcons();

        step = "start";

    }

        // ==========================================================
    // ANALYZE
    // ==========================================================

    async function analyzePhoto() {

        showLoadingState();

        updateStatus(
            "AI sedang menganalisis...",
            "#2563EB"
        );

        updateBadge(
            "Menganalisis",
            "loading"
        );

        button.disabled = true;

        button.innerHTML = `
            <i data-lucide="brain-circuit"></i>
            Menganalisis...
        `;

        refreshIcons();

        try {

            const image = canvas.toDataURL("image/jpeg");

            const csrf = document
                .querySelector('meta[name="csrf-token"]')
                .content;

            const response = await fetch("/analyze-image", {

                method: "POST",

                headers: {

                    "Content-Type":"application/json",

                    "X-CSRF-TOKEN":csrf

                },

                body: JSON.stringify({

                    image:image

                })

            });

            const result = await response.json();

            if(!result.success){

                throw result;

            }

            showAnalysis(result);

        }catch(error){

            console.error(error);

            alert(

                error.message ??

                "Terjadi kesalahan saat analisis."

            );

            showIntroState();

            updateStatus(

                "Analisis gagal",

                "#EF4444"

            );

            updateBadge(

                "Gagal",

                "waiting"

            );

            button.disabled=false;

            button.innerHTML=`
                <i data-lucide="sparkles"></i>
                Analisis AI
            `;

            refreshIcons();

        }

    }

    // ==========================================================
    // SHOW RESULT
    // ==========================================================

    function showAnalysis(data){

        showResultState();

        objectResult.textContent =
            data.object ?? "-";

        materialResult.textContent =
            data.material ?? "-";

        categoryResult.textContent =
            data.category ?? "-";

        conditionResult.textContent =
            data.condition ?? "-";

        currentRecommendations =
            data.recommendations ?? [];

        renderRecommendations();

        updateStatus(

            "Analisis selesai",

            "#22C55E"

        );

        updateBadge(

            "Selesai",

            "success"

        );

        button.disabled=false;

        button.innerHTML=`
            <i data-lucide="rotate-ccw"></i>
            Scan Lagi
        `;

        refreshIcons();

        step="reset";

    }
        // ==========================================================
    // ICON MAPPING
    // ==========================================================

    function getIdeaIcon(title = "") {

        const text = title.toLowerCase();

        if (text.includes("pot")) return "flower-2";

        if (text.includes("lamp")) return "lamp";

        if (text.includes("pensil")) return "pencil";

        if (text.includes("rak")) return "bookshelf";

        if (text.includes("vas")) return "glass-water";

        if (text.includes("hias")) return "sparkles";

        if (text.includes("organizer")) return "folder-kanban";

        if (text.includes("kotak")) return "package";

        return "lightbulb";

    }

    // ==========================================================
    // RECOMMENDATION
    // ==========================================================

    function renderRecommendations() {

        recommendationList.innerHTML = "";

        currentRecommendations.forEach((idea, index) => {

            const card = document.createElement("div");

            card.className = "recommendation-card";

            card.innerHTML = `

                <div class="recommendation-content">

                    <div class="recommendation-icon">

                        <i data-lucide="${getIdeaIcon(idea.title)}"></i>

                    </div>

                    <div class="recommendation-info">

                        <h3 class="recommendation-title">

                            ${idea.title}

                        </h3>

                        <p class="recommendation-description">

                            ${idea.description || "Ide kreatif yang bisa kamu buat dari barang ini."}

                        </p>

                    </div>

                </div>

                <div class="recommendation-meta">

                    <div class="meta-item">

                        <i data-lucide="gauge"></i>

                        <span>${idea.difficulty}</span>

                    </div>

                    <div class="meta-item">

                        <i data-lucide="clock-3"></i>

                        <span>${idea.time}</span>

                    </div>

                </div>

                <button
                    class="recommendation-button"
                    data-index="${index}">

                    Lihat Panduan

                    <i data-lucide="arrow-right"></i>

                </button>

            `;

            recommendationList.appendChild(card);

        });

        refreshIcons();

        document
            .querySelectorAll(".recommendation-button")
            .forEach(button => {

                button.addEventListener("click", () => {

                    const index =
                        button.dataset.index;

                    showDetail(
                        currentRecommendations[index]
                    );

                });

            });

    }

    // ==========================================================
    // DETAIL
    // ==========================================================

    function showDetail(data){

        showDetailState();

        detailTitle.textContent =
            data.title;

        detailDifficulty.textContent =
            data.difficulty;

        detailTime.textContent =
            data.time;

        detailTools.innerHTML="";

        detailSteps.innerHTML="";

        data.tools.forEach(tool=>{

            const li=document.createElement("li");

            li.textContent=tool;

            detailTools.appendChild(li);

        });

        data.steps.forEach(step=>{

            const li=document.createElement("li");

            li.textContent=step;

            detailSteps.appendChild(li);

        });

    }

        // ==========================================================
    // CHAT
    // ==========================================================

    sendChat.addEventListener("click", sendMessage);

    chatInput.addEventListener("keydown",(e)=>{

        if(e.key==="Enter"){

            e.preventDefault();

            sendMessage();

        }

    });

    async function sendMessage(){

        const message=

            chatInput.value.trim();

        if(!message) return;

        appendUserMessage(message);

        chatInput.value="";

        await aiTyping(message);

    }

    function appendUserMessage(text){

        const bubble=document.createElement("div");

        bubble.className="chat-bubble user";

        bubble.textContent=text;

        chatMessages.appendChild(bubble);

        scrollBottom();

    }

    function appendAIMessage(text){

        const bubble=document.createElement("div");

        bubble.className="chat-bubble ai";

        bubble.innerHTML = marked.parse(text);

        chatMessages.appendChild(bubble);

        scrollBottom();

    }

    async function aiTyping(message){

        const typing=document.createElement("div");

        typing.className="chat-bubble ai";

        typing.innerHTML=`
            <i data-lucide="brain-circuit"></i>
            AI sedang mengetik...
        `;

        chatMessages.appendChild(typing);

        refreshIcons();

        scrollBottom();

        const csrf=document
            .querySelector('meta[name="csrf-token"]')
            .content;

        try{

            const response=await fetch("/chat-ai",{

                method:"POST",

                headers:{

                    "Content-Type":"application/json",

                    "X-CSRF-TOKEN":csrf

                },

                body:JSON.stringify({

                    message

                })

            });

            const result=await response.json();

            typing.remove();

            if(result.success){

                appendAIMessage(result.reply);

            }else{

                appendAIMessage("AI gagal menjawab.");

            }

        }catch(error){

            console.error(error);

            typing.remove();

            appendAIMessage(

                "Tidak dapat terhubung ke AI."

            );

        }

    }

    function scrollBottom(){

        chatMessages.scrollTop=

            chatMessages.scrollHeight;

    }

}