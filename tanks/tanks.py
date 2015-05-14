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

pygame.draw.line(gameDisplay,red,(200,300),(500,500),5)  #(where,what color,start point(tuple),end point(tuple),width)

pygame.draw.circle(gameDisplay,red,(200,200),50)   #(where,color,center(),radius)

pygame.draw.rect(gameDisplay,green,(250,150,200,100)) #(where,color,(topleft,width,height))

pygame.draw.polygon(gameDisplay,white,((140,5),(200,16),(100,333),(500,222),(250,250)))  #(where,color,points())



while True:
    for event in pygame.event.get():
        if event.type==pygame.QUIT:
            pygame.quit()
            quit()

    pygame.display.update()

