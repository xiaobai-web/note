# 计算指定的年月日是这一年的第几天 -------------------------------------------------------------------------------
year = int(input('请输入年份'))
month = int(input('请输入月份'))
date = int(input('请输入日'))
def is_leap_year(year):
    return year % 4 == 0 and year % 100 != 0 or year % 400 == 0
def which_day(year, month, date):
    day_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31] if is_leap_year(year) else [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    total = 0
    # day_month[month]
    for x in range(month - 1):
        total += day_month[x]
    total += date
    return total

total = which_day(year, month, date)
print('%d年%d月%d日是今年的第%d天' % (year, month, date, total))

# 打印杨辉三角 -------------------------------------------------------------------------------
def yanghui(row):
    yanghui = [[]] * row
    for x in range(row):
        yanghui[x] = [None] * (x +1)
        for y in range(x +1):
            if y == 0 or y == x:
                yanghui[x][y] = 1
            else:
                yanghui[x][y] = yanghui[x-1][y-1] + yanghui[x-1][y]
            print(yanghui[x][y], end='\t')
        print()
    # print('结束')

row = int(input('row = '))
yanghui(row)

# 时钟 ---------------------------------------------------------------------------------------
from time import sleep

class Clock:
    ''' 数字时钟 '''
    def __init__(self, hour, minute, second):
        self._hour = hour
        self._minute = minute
        self._second = second

    def run(self):
        self._second += 1
        if self._second == 60:
            self._second = 0
            self._minute += 1
            if self._minute == 60:
                self._minute = 0
                self._hour += 1
                if self._hour == 24:
                    self._hour = 0

    def show(self):
        return '%02d:%02d:%02d' % (self._hour, self._minute, self._second)

def main():
    clock = Clock(23,59,58)
    while True:
        print(clock.show())
        sleep(1)
        clock.run()

if __name__ == '__main__':
    main()


# 绘制三角形 -----------------------------------------------------------------------------------------
import turtle
import math

class Triangle(object):

    def __init__(self, a, b, c):
        self._a = a
        self._b = b
        self._c = c

    @staticmethod
    def is_valid(a, b, c):
        return a + b > c and b + c > a and a + c > b

    # 求三角形角度
    def jiaodu(self):
        a = self._a
        b = self._b
        c = self._c
        A = math.degrees(math.acos((a * a - b * b - c * c) / (-2 * b * c))) # 对应b
        B = math.degrees(math.acos((b * b - a * a - c * c) / (-2 * a * c))) # 对应c
        C = math.degrees(math.acos((c * c - a * a - b * b) / (-2 * a * b))) # 对应a
        jiaodu = [A,B,C]
        return jiaodu

    def turtle_img(self):
        jiaodu = self.jiaodu() # 生成角度
        print(jiaodu)
        turtle.screensize(canvwidth=150, canvheight=150, bg='blue') # 画布大小
        turtle.setup(width=0.5, height=0.5) # 窗口大小
        turtle.pensize(0.5) # 画笔宽度
        turtle.pencolor('red') # 画笔颜色
        turtle.speed(1) # 画笔速度
        turtle.fillcolor('red')
        turtle.begin_fill() # 开始填充颜色
        turtle.hideturtle() # 隐藏画笔
        turtle.penup() # 提起画笔
        turtle.goto(-100, 0) # 移动画笔
        turtle.pendown() # 落下画笔
        turtle.forward(self._b)
        turtle.left(180 - jiaodu[0])
        turtle.forward(self._c)
        turtle.left(180 - jiaodu[1])
        turtle.forward(self._a)
        turtle.end_fill() # 填充完毕
        turtle.mainloop()
def main():
    a, b, c = 500, 500, 500
    # 静态方法和类方法都是通过给类发消息来调用的
    if Triangle.is_valid(a, b, c):
        t = Triangle(a, b, c)
        Triangle.turtle_img(t)
        # Triangle.turtle_img(t)
    else:
        print('无法构成三角形.')


if __name__ == '__main__':
    main()



# 奥特曼打小怪兽 -------------------------------------------------------------------------------
from abc import ABCMeta, abstractclassmethod
from random import randint, randrange

class Personage(metaclass=ABCMeta):
    """
        人物通用类
    """
    def __init__(self, name, hp):
        self._name = name
        self._hp = hp

    @property
    def name(self):
        return self._name

    @property
    def hp(self):
        return self._hp

    @hp.setter
    def hp(self, hp):
        self._hp = hp if hp >=0 else 0

    @property
    def alive(self):
        return self._hp > 0

    @abstractclassmethod
    def attack(self, other):
        '''

        :param other: 攻击对象
        '''
        pass


class Aoteman(Personage):
    """
        奥特曼
    """
    __slots__ = ('_name', '_hp', '_mp')

    def __init__(self, name, hp, mp):
        super().__init__(name, hp)
        self._mp = mp

    def attack(self, other):
        other.hp -= randint(20, 30)

    def big_attack(self, other):
        """究极必杀技(打掉对方至少50点或一半的血)

        :param other: 被攻击的对象
        :return: 使用成功返回True否则返回False
        """
        if self._mp >= 50:
            self._mp -= 50
            assault = other.hp * 2 / 4
            assault = assault if assault >= 50 else 50
            other.hp -= assault
            return True
        else:
            self.resume()
            return False

    def magic_attack(self, others):
        """范围性魔法攻击

        :param others: 被攻击的群体
        :return: 使用成功返回True否则返回False
        """
        if self._mp >= 20:
            self._mp -= 20
            for temp in others:
                if temp.alive:
                    temp.hp -= randint(15, 25)
            return True
        else:
            self.resume()
            return False

    def resume(self):
        """
        回复魔法值
        :return:
        """
        return_mp = randint(5, 10)
        self._mp += return_mp
        return return_mp

    def __str__(self):
        return '---------%s奥特曼---------\n' % self._name + '生命值: %d \n' % self._hp + '魔法值：%d \n' % self._mp

class Guaishou(Personage):
    __slots__ = ('_name', '_hp')

    def __init__(self, name, hp, mp):
        super().__init__(name, hp)
        self._mp = mp

    def attack(self, other):
        other.hp -= randint(10, 20)

    def crit(self, other):
        """全力一击

        :param other: 被攻击的对象
        :return: 使用成功返回True否则返回False
        """
        if self._mp >= 10:
            self._mp -= 10
            assault = randint(15, 30)
            other.hp -= assault
            return True
        else:
            self.attack(other)
            return False

    def __str__(self):
        return '~~~%s小怪兽~~~\n' % self._name + '生命值: %d\n' % self._hp + '魔法值：%d\n' % self._mp

# 判断还有没有怪兽活着
def is_any_alive(clas):
    for guaishou in clas:
        if guaishou.alive > 0:
            return True
    return False

def alive_guaishou(clas):
    alive_guaishou = []
    for guaishou in clas:
        if guaishou.alive > 0:
            alive_guaishou.append(guaishou)
    return alive_guaishou

def select_alive_one(clas):
    alive_guaishou = []
    alive_guaishou_sum = 0

    for guaishou in clas:
        if guaishou.alive > 0:
            alive_guaishou.append(guaishou)
            alive_guaishou_sum += 1
    if alive_guaishou_sum > 1:
        select_guaishou = randrange(0, alive_guaishou_sum - 1)
    else:
        select_guaishou = 0
    return alive_guaishou[select_guaishou]

def display_info(aoteman, guaishous):
    """显示奥特曼和怪兽的信息"""
    print(aoteman)
    for guaishou in guaishous:
        print(guaishou)


def main():
    super = Aoteman('小黑', 1000, 200)
    monster1 = Guaishou('甲', 300, 40)
    monster2 = Guaishou('乙', 250, 50)
    monster3 = Guaishou('丙', 280, 60)
    monsters = [monster1, monster2, monster3]
    fight_round = 1
    while super.alive and is_any_alive(monsters):
        print('==============第%02d回合==============' % fight_round)
        fight_round += 1
        monster = select_alive_one(monsters)
        skill = randint(1, 10)
        if skill <= 5:
            print('%s使用普通攻击打了%s' % (super.name, monster.name))
            super.attack(monster)
        elif skill <=9:
            if super.magic_attack(monsters):
                print('%s使用魔法攻击,效果拔群' % super.name)
            else:
                print('%sl蓝量不足,使用魔法失败,回复蓝量' % super.name)
        else:
            if super.big_attack(monster):
                print('%s使用了超必杀技攻击%s' % (super.name, monster.name))
            else:
                print('%s蓝量不足,超必杀技无法使用,回复蓝量' % super.name)

        alive_guaishouer = alive_guaishou(monsters)
        print('怪兽们发起了回击')
        for guaishou in alive_guaishouer:
            decide_baoji = randint(1, 10)
            if decide_baoji >= 8:
                print('%s使用普通攻击打了%s' % (guaishou.name, super.name))
                guaishou.attack(super)
            else:
                if guaishou.crit(super):
                    print('%s使用全力一击打了%s' % (guaishou.name, super.name))
                else:
                    print('%s使用普通攻击打了%s' % (guaishou.name, super.name))

        display_info(super, monsters)
    print('\n========战斗结束!========\n')

    if super.alive > 0:
        print('%s奥特曼胜利!' % super.name)
    else:
        print('小怪兽胜利!')

if __name__ == '__main__':
    main()
