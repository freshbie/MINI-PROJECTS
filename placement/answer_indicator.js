			var answer=0;
            var notans=20;
            var review=0;

            var rev=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            var ans=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

            document.getElementById("answered").innerHTML = answer;
            document.getElementById("not_answered").innerHTML = notans;
            document.getElementById("review_marked").innerHTML = review;
            
			function disp()
			{
				document.getElementById("rev").innerHTML = review;
				document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
			}
			
            function mark_review(id) 
            {
                document.getElementById('qc_'+id).style.background = "#5bc0de";
                if(rev[id]==0)
                {
                    rev[id]=1;
                    review++;
                }
                document.getElementById("rev").innerHTML = review;
            } 

            function unreview(id) 
            {
                if(rev[id]==1)
                {
                    review--;
                    rev[id]=0;
                    if(ans[id]!=0)
                    {
                        document.getElementById('qc_'+id).style.background = "green";
                    }
                    else document.getElementById('qc_'+id).style.background = "#cccccc";
                }
                document.getElementById("rev").innerHTML = review;
            } 

            function clear_ans(id) 
            {
                document.getElementById('q'+id+'a').checked=false;
                document.getElementById('q'+id+'b').checked=false;
                document.getElementById('q'+id+'c').checked=false;
                document.getElementById('q'+id+'d').checked=false;
                if(rev[id]==0)
                    document.getElementById('qc_'+id).style.background = "#cccccc";
                else document.getElementById('qc_'+id).style.background = "#5bc0de";
                
                if(ans[id]==1)
                    {
                        ans[id]=0;
                        answer--;
                        notans++;
                    }
                document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
            }  

            function radioclick(id) {
				if(rev[id]==0)
					document.getElementById('qc_'+id).style.background = "green";
                if(ans[id]==0)
                {
                    ans[id]=1;
                    answer++;
                    notans--;
                }
                document.getElementById("ans").innerHTML = answer;
                document.getElementById("nans").innerHTML = notans;
            }