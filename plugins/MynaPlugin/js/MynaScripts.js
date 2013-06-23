var WizardControl = function(attributes){
    var self = this;
    self.pages = attributes.pages;
    self.nextPageControl = attributes.nextPageControl;
    self.prevPageControl = attributes.prevPageControl;
    self.cancelControl = attributes.cancelControl;    
    self.cancelAction = attributes.cancelAction;   
    self.initalPage = attributes.initalPage;
    self.currentPage = self.initalPage;
    
    $.each(self.pages,function(i, val){
        if(self.initalPage != i){
            val.hide();//add more depth to this so a page can contain more than just the div
        }
    });
    self.nextPageControl.click(function(){
        self.currentPage++;
        $.each(self.pages,function(i, val){
            if(self.currentPage != i){
                val.hide();//add more depth to this so a page can contain more than just the div
            }
        });
    });
}