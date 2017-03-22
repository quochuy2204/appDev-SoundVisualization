OBJ = main.o wave.o screen.o comm.o #: these 2 files will add to the project later
APPNAME = wave.a

$(APPNAME) : $(OBJ)
	gcc -o $(APPNAME) $(OBJ) -lm -lcurl

%.o : %.c
	gcc -c -o $@ $< -std=c99

clean:
	rm $(OBJ) $(APPNAME)

archive:
	tar cf wave.tar *.c *.h makefile
