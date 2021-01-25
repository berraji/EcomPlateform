Ex1

void affichage(MyListe L)
{
    if(L)
    {
        printf("%d\n",L->value);
        affichage(L->nextElement);
    }

}

Ex2
void affichage2(MyListe L)
{
    if(L)
    {
        printf("%d\n",L->value);
        affichage(L->nextElement);
    }

}

Complexité O(n)