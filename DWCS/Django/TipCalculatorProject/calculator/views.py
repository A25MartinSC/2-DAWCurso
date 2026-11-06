import math
from django.shortcuts import render


def home(request):
    return render(request, 'calculator/home.html')


def result(request):
    bill = float(request.GET.get('bill'))
    tip = int(request.GET.get('tip'))
    people = int(request.GET.get('people'))
    roundUp = request.GET.get('roundUp')

    tipAmount = bill * tip / 100
    total = bill + tipAmount
    perPerson = total / people

    if roundUp:
        perPerson = math.ceil(perPerson)

    context = {
        'bill': bill,
        'tip': tip,
        'tipAmount': round(tipAmount, 2),
        'total': round(total, 2),
        'people': people,
        'perPerson': round(perPerson, 2),
    }
    return render(request, 'calculator/result.html', context)


def about(request):
    return render(request, 'calculator/about.html')