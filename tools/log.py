import os

filename="C:\\xampp\\apache\\logs\\access.log"
log=""
program=True

while program:
    #
    file=open(filename,"r")
    data=file.read()
    file.close()
    if data!=log:
        if len(data)>len(log):
            for i in data.splitlines():
                if i not in log:
                    print(i)
        else:
            os.system("cls")
            print(data)
        log=data
