<?php
require_once 'apiHandler.php';

class view 
{
    function mainPage()
    {
        $content = "";
        $content .= "<div class=\"container portfolio\">
                        <div class=\"bio-info\">
                                <div class=\"row\">
                                        <div class=\"col-md-6\">
                                                <div class=\"row\">
                                                        <div class=\"col-md-12\">
                                                                <div class=\"bio-image\">
                                                                        <img src=\"media/img/mainPic.jpg\" alt=\"image\" class=\"img-thumbnail\" />
                                                                </div>			
                                                        </div>
                                                </div>	
                                        </div>
                                        <div class=\"col-md-6\">
                                                <div class=\"bio-content\">
                                                        <h1>Hey! I'm Taylor</h1>
                                                        <h6>I am a fresh web designer and I create custom web designs. I'm skilled at writing well-designed, testable and efficient code using current best practices in Web development. I'm a fast learner, hard worker and team player who is proficient in making creative and innovative web pages.</h6>
                                                        <p>P.S I have no special talent, I'm just passionately curious ;)</p>
                                                </div>
                                        </div>
                                </div>	
                        </div>
                </div>";

        return $content;
    }
    
    function gitHubPG()
    {
        $content = "";
        
        $content .= 
         "<section class=\"jumbotron text-center\">
            <div class=\"container\">
              <h1 class=\"jumbotron-heading\">My GitHub</h1>
              <p class=\"lead text-muted\">List of all my stuff on GitHub dynamically created based off Github's v4 API.</p>
            </div>
          </section>

          <div class=\"album py-5 bg-light\">
            <div class=\"container\">

              <div class=\"row\">";
        //Creates the correct amount of cards based off how many repos comes back from API call.
        
        /*
                <div class=\"col-md-4\">
                  <div class=\"card mb-4 shadow-sm\">
                    <div class=\"card-body\">
                      <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class=\"d-flex justify-content-between align-items-center\">
                        <div class=\"btn-group\">
                          <button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View on GitHub</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             </div>";*/
                
        $content.= "</div>";
        
        
        return $content;
    }
}
