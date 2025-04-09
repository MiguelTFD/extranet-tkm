document.addEventListener('DOMContentLoaded',()=>{

    function getUrlLastPathName(url=window.location.pathname){
        let paths = url.split("/").filter(path=>path);
        return paths.pop();
    }
    
    function setBannerTitleName(){
        let title = document.getElementsByClassName("banner_title");
        switch(getUrlLastPathName()){
            case "products":
                    for(let i = 0; i<title.length; i++){
                        title[i].innerText=`Productos`;
                    }
                    break;
            case "about":
                    for(let i = 0; i<title.length; i++){
                        title[i].innerText=`Sobre Nosotros`;
                    }
                    break;
            case "contact":
                    for(let i = 0; i<title.length; i++){
                        title[i].innerText=`Contactanos`;
                    }
                    break;
            default:

                break; 
        }
    }

    function setBannerBackgroundImage() {
        const banner = document.getElementById('banner_layout');
        const backgroundStyles = 'linear-gradient(rgba(146, 147, 2, 0.3), '+
            'rgba(146, 147, 2, 0.3)), ';
        const urlBasePath = '../images/';
        
        switch (getUrlLastPathName()) {
            case "products":
                banner.style.background = 
                    `${backgroundStyles}`+
                    `url(${urlBasePath}moss-1.webp)`+
                    ` center center / cover no-repeat`;
                break;
            case "about":
                banner.style.background = 
                    `${backgroundStyles}`+
                    `url(${urlBasePath}moss-2.webp)`+
                    ` center center / cover no-repeat`;
                break;
            case "contact":
                banner.style.background = 
                    `${backgroundStyles}`+
                    `url(${urlBasePath}moss-3.jpeg)`+
                    ` center center / cover no-repeat`;
                break;
            default:
                
                break;
        }
    }


    getUrlLastPathName();
    setBannerTitleName();
    setBannerBackgroundImage();
})
