var left = document.getElementById("left")
var right = document.getElementById("right")
var right_img = document.querySelectorAll("img").length - 4
var left_img = 0

left.addEventListener('click', () => {
    move(0, 1);
})

right.addEventListener('click', () => {
    move(0, -1);
})

function move(stop, dir){
    
    images = document.getElementById("images")
    if ( (dir==1 && left_img>0 ) || (dir==-1 && right_img>0) ) {
        images.style.left = (parseInt(getComputedStyle(images).left)) + (dir * 20) + "px";
    }

    if (stop<=160) setTimeout(move, 10, stop+20, dir)   
    else if (dir==-1 && right_img!=0) {right_img--; left_img++}
    else if (dir==1 && left_img!=0) {left_img--; right_img++}
}



function get_month(num){
    months = ["იანვარი","თებერვალი","მარტი","აპრილი","მაისი","ივნისი","ივლისი","აგვისტო","სექტემბერი"
                    ,"ოქტომბერი","ნოემბერი","დეკემბერი"]
    return months[num]
}

function time(date){
    var time_panel = document.getElementById("time")
    var hour = date.getHours()
    var min = date.getMinutes()
    var sec = date.getSeconds()
    if (min<10){min = "0" + min}
    if (sec<10){sec = "0" + sec}
    time_panel.innerText = `${hour} : ${min} : ${sec}`
    if (hour==23 && min==59 && sec==59){
        setTimeout(top_panel,1500,new Date)
    }
    setTimeout(time,500,new Date)
}

function top_panel(date){ 
    var year = date.getFullYear();
    var month = date.getMonth();
    var days_num = 32 - new Date(year,month,32).getDate()
    
    var year_panel = document.getElementById("year")
    var month_panel = document.getElementById("month")

    year_panel.innerText = year
    month_panel.innerText = get_month(month)
    days(days_num,date)
    // setInterval(top_panel,1000,new Date)
    
}

function days(days_limit,date){
    var tbody = document.getElementById("cal_tbody")    
    tbody.innerHTML = ""
    var now = date.getDate()
    var count = 1

    
    for(let i=1;i<=5;i++){
        let row = document.createElement("tr")
        tbody.appendChild(row)
        
        for(let j=1;j<=7;j++){
            let col = document.createElement("td")
            if(count<=days_limit){
                col.innerHTML = count
                if(count==now){col.classList.add("green");}
                count++
            }
            row.appendChild(col)
        }
    }
}

function prev(){
    get_month()
    var year = Number(document.getElementById("year").innerHTML)
    var month = document.getElementById("month").innerHTML
    month = months.indexOf(month)
    
    if(month==0){year--;month=11}
    else{month--}        
    var date = new Date(year,month,1)
    
    top_panel(date)
    
    if (month!=new Date().getMonth() || year!=new Date().getFullYear()){
        var today = document.getElementsByClassName("green")[0]
        today.classList.remove("green")
    }
    else{top_panel(new Date)}
}

function next(){
    get_month()
    var year = Number(document.getElementById("year").innerHTML)
    var month = document.getElementById("month").innerHTML
    
    month = months.indexOf(month)
    
    if(month==11){year++;month=0}
    else{month++}        
    var date = new Date(year,month,1)
    top_panel(date)
   
    if (month!=new Date().getMonth() || year!=new Date().getFullYear()){
        var today = document.getElementsByClassName("green")[0]
        today.classList.remove("green")
    }
    else{top_panel(new Date)}
}

top_panel(new Date);
time(new Date)