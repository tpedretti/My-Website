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
                                                        <h6>I'm a new grad fresh from CSUSB (California State University San Bernardino). </h6>
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
        $gitAPI = new apiHandler();
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
                     
                /*<div class=\"col-md-4\">
                  <div class=\"card mb-4 shadow-sm\">
                  <svg class=\"bd-placeholder-img card-img-top\" width=\"100%\" height=\"50\"><title>Placeholder</title><text x=\"35%\" y=\"50%\" dy=\".3em\">Git Hub Repo Title</text></svg>
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
        //<div class=\"card-header\">Header</div>
        
        $repos = $gitAPI->githubRepos();
        for($i = 0; $i < count($repos); $i++)
        {
            //echo $i . '</br>';
            //echo $repos[$i]->getURL() . '</br>';
            if($repos[$i]->getIsForked() == false)
            {
                $content .= "
                <div class=\"col-md-4\">
                    <div class=\"card border-dark mb-3\" style=\"max-width: 20rem;\">
                            <div class=\"card-body\">
                            <h4 class=\"card-title\">" . $repos[$i]->getName() . "</h4>
                            <p class=\"card-text\">" . $repos[$i]->getDescription() . "</p>
                            <div class=\"btn-group\">
                            <a type=\"button\" class=\"btn btn-sm btn-outline-secondary\" href=\"".$repos[$i]->getURL()."\">View on GitHub</a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
        
        $content.= "</div>";        
        
        return $content;
    }
}
