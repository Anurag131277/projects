import pygame
import time
import random

pygame.init()


white=(255,255,255)
black=(0,0,0)
red=(200,0,0)
light_red=(255,0,0)
green=(0,155,0)
yellow=(200,200,0)
light_yellow=(255,255,0)
light_green=(0,255,0)


display_width=800
display_height=600
gameDisplay= pygame.display.set_mode((display_width,display_height))
pygame.display.set_caption('TANKS')

#icon=pygame.image.load('apple.png')
#pygame.display.set_icon(icon)

#img=pygame.image.load('SSnakehead.png')
#appleimg=pygame.image.load('apple.png')

#pygame.display.update()
clock=pygame.time.Clock()
AppleThickness=30
block_size=20



tankWidth=40
tankHeight=20

turretWidth=5
wheelWidth=5

smallfont = pygame.font.SysFont("comicsansms" ,25)   #defining object font
medfont = pygame.font.SysFont("comicsansms" ,50)
largefont = pygame.font.SysFont("comicsansms" ,80)
def pause():
    paused=True
    message_to_screen("Paused",
                      black,
                      -100,size="large")
    message_to_screen("press C to contiune or Q to quit.",
                      black,25)
    pygame.display.update()
    
    while paused:
        for event in pygame.event.get():
            if event.type==pygame.QUIT:
                pygame.quit()
                quit()
            if event.type==pygame.KEYDOWN:
                if event.key==pygame.K_c:
                    paused=False
                elif event.key==pygame.K_q:
                    pygame.quit()
                    quit()
        #gameDisplay.fill(white)   #for a differnt pause screen
        
        clock.tick(5)
        
        

def score(score):
    text=smallfont.render("SCORE: "+str(score),True,black)
    gameDisplay.blit(text,[0,0])
    

def randAppleGen():
    randAppleX=round(random.randrange(0,display_width-AppleThickness))#/10.0)*10.0
    randAppleY=round(random.randrange(0,display_height-AppleThickness))#/10.0)*10.0

    return randAppleX,randAppleY

#Game Inro function
def game_intro():
    intro=True
    while intro:
        for event in pygame.event.get():
            #print event
            if event.type==pygame.QUIT:
                pygame.quit()
                quit()
            if event.type==pygame.KEYDOWN:
                if event.key==pygame.K_c:
                    intro=False
                if event.key==pygame.K_q:
                    pygame.quit()
                    quit()
                    
        gameDisplay.fill(white)
        message_to_screen("Welcome to Tanks!",green,-100,size="large")
        message_to_screen("The Objective is to shoot and Destroy",black,
                          -30)
        message_to_screen("the enemy tanks before they destroy you",black,
                            10)
        message_to_screen("The more you destroy the harder it get",black,
                            50)
        

        button("Play",150,500,100,50,green,light_green,action="play")
        button("Controls",350,500,100,50,yellow,light_yellow,action="controls")
        button("Quit",550,500,100,50,red,light_red,action="quit")

        

        
        pygame.display.update()
        clock.tick(15)

#centering the text
def text_objects(text,color,size):
    if size=="small":
        textSurface=smallfont.render(text,True,color)
    elif size=="medium":
        textSurface=medfont.render(text,True,color)
    elif size=="large":
        textSurface=largefont.render(text,True,color)
    return textSurface,textSurface.get_rect()

#entering text in buttons
def text_to_button(msg,color,buttonx,buttony,buttonwidth,buttonheight,size="small"):
    textSurf,textRect=text_objects(msg,color,size)
    textRect.center=((buttonx+(buttonwidth/2)),buttony+(buttonheight/2))
    gameDisplay.blit(textSurf,textRect)
def game_controls():
    
    gamecount=True
    while gamecount:
        for event in pygame.event.get():
            #print event
            if event.type==pygame.QUIT:
                pygame.quit()
                quit()
                    
        gameDisplay.fill(white)
        message_to_screen("Controls",green,-100,size="large")
        message_to_screen("Fire:Spacebar",black,
                          -30)
        message_to_screen("Move turrent :Up and Down Arrows",black,
                            10)
        message_to_screen("Move tank:Left and right Arrows",black,
                            50)
        message_to_screen("Pause:P",black,90)
        
        

        button("Play",150,500,100,50,green,light_green,action="play")
        #button("Main",350,500,100,50,yellow,light_yellow,action="main")
        button("Quit",550,500,100,50,red,light_red,action="quit")

        

        
        pygame.display.update()
        clock.tick(15)

#to create a button at a location with response
def button(text,x,y,width,height,inactive_color,active_color,action=None):
    cur=pygame.mouse.get_pos()
    click=pygame.mouse.get_pressed()
    
    if x+width > cur[0] > x and y+height > cur[1] >y :
        pygame.draw.rect(gameDisplay,active_color,(x,y,width,height))
        if click[0]== 1 and action != None:
            if action=="quit":
                pygame.quit()
                quit()

            if action=="controls":
                game_controls()

            if action=="play":
                gameLoop()
##            if action=="main":
##                game_intro()
            
    else:
        pygame.draw.rect(gameDisplay,inactive_color,(x,y,width,height))

    text_to_button(text,black,x,y,width,height)


def tank(x,y,turPos,color):
    x=int(x)
    y=int(y)

    possibleTurrets=[(x-27,y-2),
                     (x-26,y-5),
                     (x-25,y-8),
                     (x-23,y-12),
                     (x-20,y-14),
                     (x-18,y-15),
                     (x-15,y-17),
                     (x-13,y-19),
                     (x-11,y-21)
                     ]
    pygame.draw.circle(gameDisplay,color,(x,y),int(tankHeight/2))
    pygame.draw.rect(gameDisplay,color,(x-(int(tankWidth/2)),y,tankWidth,tankHeight))

    


    pygame.draw.line(gameDisplay,color,(x,y),possibleTurrets[turPos],turretWidth)

    startX=15
    for i in range(7):
        pygame.draw.circle(gameDisplay,color,(x-startX,y+20),wheelWidth)
        startX-=5
        
    
def message_to_screen(msg,color,y_displace=0,size="small"):
    textSurf,textRect=text_objects(msg,color,size)
    textRect.center=(display_width/2),(display_height/2)+y_displace
    gameDisplay.blit(textSurf,textRect)


def barrier(xlocation,randomHeight):
    
    pygame.draw.rect(gameDisplay,black,[xlocation,display_height-randomHeight,50,randomHeight])

    
def gameLoop():
    global direction
    direction='right'
    gameExit=False
    gameOver=False
    FPS=15
    
    mainTankX=display_width*0.9
    mainTankY=display_height*0.9
    tankMove=0

    currentTurPos =0
    changeTur=0

    xlocation=(display_width/2)+ random.randint(-0.2*display_width,0.2*display_width)
    randomHeight=random.randrange(display_height*.01,display_height*0.6)

    

    
    while not gameExit:

        if gameOver==True:
            message_to_screen("Game Over",red,y_displace=-50,size="large")
            message_to_screen("Press C to play again or Q to quit",
                              black,
                              y_displace=50,
                              size="medium")
            pygame.display.update()
         
        while gameOver==True:
            for event in pygame.event.get():
                if event.type==pygame.QUIT:
                    gameExit=True
                    gameOver=False
                if event.type==pygame.KEYDOWN:
                    if event.key==pygame.K_q:
                        gameExit=True
                        gameOver=False
                    if event.key==pygame.K_c:
                        gameLoop()



        
        for event in pygame.event.get():
            
            if event.type==pygame.QUIT:
                gameExit=True
            if event.type==pygame.KEYDOWN:
                if event.key==pygame.K_LEFT:
                    tankMove=-5
                    
                elif event.key==pygame.K_RIGHT:
                    tankMove=5
                    
                elif event.key==pygame.K_UP:
                    changeTur=1
                elif event.key==pygame.K_DOWN:
                    changeTur=-1
                elif event.key==pygame.K_p:
                    pause()
            elif event.type==pygame.KEYUP:
                if event.key==pygame.K_LEFT or event.key==pygame.K_RIGHT:
                    tankMove=0
                if event.key==pygame.K_UP or event.key==pygame.K_DOWN:
                    changeTur=0
                
                    
       

        

        gameDisplay.fill(white)
        mainTankX+=tankMove
        currentTurPos+=changeTur

        if currentTurPos >8:
            currentTurPos=8
        elif currentTurPos<0:
            currentTurPos=0


        
        tank(mainTankX,mainTankY,currentTurPos,red)
        
        barrier(xlocation,randomHeight)
        pygame.display.update()
        clock.tick(FPS)
        
    pygame.quit()
    quit()
game_intro()
gameLoop()

#63
