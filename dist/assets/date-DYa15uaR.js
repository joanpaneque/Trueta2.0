function s(l){let[e,t]=l.split("T"),i=e.split("-");e=`${i[2]}/${i[1]}/${i[0]}`,t=t.split(".")[0];let p=t.split(":");return p[0]=(parseInt(p[0])+2)%24,t=p.join(":"),`${e} ${t}`}export{s as p};
