import pygame

pygame.init()

white=(255,255,255)
black=(0,0,0)
red=(255,0,0)
green=(0,255,0)
blue=(0,0,255)

gameDisplay=pygame.display.set_mode((800,600))

gameDisplay.fill(blue)

Pix=pygame.PixelArray(gameDisplay)

Pix[10][10]=green
height=100
width=200
x=300
y=300
#pygame.draw.line(gameDisplay,red,(200,300),(500,500),5)  #(where,what color,start point(tuple),end point(tuple),width)

pygame.draw.circle(gameDisplay,red,(x,y),int(height/2))   #(where,color,center(),radius)

pygame.draw.rect(gameDisplay,green,(x-int(width/2),y,width,height)) #(where,color,(topleft,width,height))

#pygame.draw.polygon(gameDisplay,white,((140,5),(200,16),(100,333),(500,222),(250,250)))  #(where,color,points())



while True:
    for event in pygame.event.get():
        if event.type==pygame.QUIT:
            pygame.quit()
            quit()

    pygame.display.update()

